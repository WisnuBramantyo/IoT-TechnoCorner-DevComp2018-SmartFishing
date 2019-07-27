//MANTAP MANIA? MANCING!

#include <SPI.h>
#include <RH_RF95.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#define ONE_WIRE_BUS 3

// Setup a oneWire instance to communicate with any OneWire devices (not just Maxim/Dallas temperature ICs)
OneWire oneWire(ONE_WIRE_BUS);
// Pass our oneWire reference to Dallas Temperature. 
DallasTemperature sensors(&oneWire);
float data;
RH_RF95 rf95;
volatile int f_wdt=1;

void setup() 
{
  
  Serial.begin(9600);
  while (!Serial) ; 
  if (!rf95.init())
    Serial.println("inisialisasi gagal");
}

void loop()
{
  if(f_wdt != 1) 
  {
      return; 
  }
  for(int a=0; a<120 ; a++)
  {
  sensors.requestTemperatures();
  data = sensors.getTempCByIndex(0);
  Serial.print(" \n ");
  Serial.println("Mengirim data ke server");
  // Send a message to rf95_server
  Serial.print("Suhu : ");
  Serial.println(data);
}
