#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
 
// Enter the IP address for Arduino.Be careful to use , insetead of . when you enter the address here
IPAddress ip(10,0,80,19);
//For CO sensor
int photocellPin = 2;  // Analog input pin on Arduino we connected the SIG pin from sensor
int photocellReading;  // Here we will place our reading
int DOUTpin=8;
int ledPin=13;
//For dust sensor
int measurePin = 5;
int ledPower = 13;
int samplingTime = 280;
int deltaTime = 40;
int sleepTime = 9680;
float voMeasured = 0;
float calcVoltage = 0;
float dustDensity = 0;

char server[] = "10.0.80.27"; // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie. "www.yourwebpage.com")

// Initialize the Ethernet server library
EthernetClient client;

void setup() {
 
  // Serial.begin starts the serial connection between computer and Arduino
  Serial.begin(9600);
  //For CO sensor
  pinMode (DOUTpin, INPUT); 
  pinMode (ledPin, OUTPUT);
  //For dust sensor
  pinMode(ledPower,OUTPUT);
  // start the Ethernet connection
  Ethernet.begin(mac,ip);
}

void loop() {
 
  photocellReading = analogRead(photocellPin); // Fill the sensorReading with the information from CO sensor

  digitalWrite(ledPower,LOW); // power on the LED
  delayMicroseconds(samplingTime);
 
  voMeasured = analogRead(measurePin); // read the dust value
  delayMicroseconds(deltaTime);
  digitalWrite(ledPower,HIGH); // turn the LED off
  delayMicroseconds(sleepTime);

  // 0 - 3.3V mapped to 0 - 1023 integer values
  // recover voltage
  calcVoltage = voMeasured * (3.3 / 1024);
  dustDensity = 0.17 * calcVoltage - 0.1;
  
  // Connect to the server (your computer or web page)  
  if (client.connect(server, 80)) {
    Serial.println("--> connected\n");
    client.print("GET /write.php?"); // This
    client.print("value="); // This CO
    client.print(photocellReading); // And this is what we did in the testing section above. We are making a GET request just like we would from our browser but now with live data from the sensor
    client.print("-"); // This for Dust
    client.print(voMeasured); 
    client.println(" HTTP/1.1"); // Part of the GET request
    client.println("Host: 10.0.80.27"); // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie.Host: "www.yourwebpage.com")
    client.println("Connection: close"); // Part of the GET request telling the server that we are over transmitting the message
    client.println(); // Empty line
    client.println(); // Empty line
    client.stop();    // Closing connection to server

  }else {
    // If Arduino can't connect to the server (your computer or web page)
    Serial.println("--> connection failed\n");
  }
 
  // Give the server some time to recieve the data and store it. I used 10 seconds here. Be advised when delaying. If u use a short delay, the server might not capture data because of Arduino transmitting new data too soon.
  delay(30000);
}
