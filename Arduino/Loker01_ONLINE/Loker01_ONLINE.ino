/* 3,3V  - PIN 3,3V
 * RST   - PIN D3
 * GND   - PIN GND
 * 
 * MISO  - PIN D6
 * MOSI  - PIN D7
 * SCK   - PIN D5
 * SDA   - PIN D4
 * 
 * LDC SCL D1 SDA D2
 */
#include <ESP8266WiFi.h>
#include <SPI.h>
#include <MFRC522.h>
#include <LiquidCrystal_I2C.h>
#define SS_PIN D8//d4
#define RST_PIN D3//d3
#define pinrelay D0
#define pinSensor D4
#include <ESP8266HTTPClient.h>

// Use WiFiclient class to create TCP connections
WiFiClient client;
HTTPClient http;


LiquidCrystal_I2C lcd(0x27, 16, 2);

int state = 0;
int tutup= 0;
String uidTutup = ""; 
String uidBuka = "";   
String cek1 = "";
String cek2 = "";
String ktp = "";


//Konfigurasi WiFi
const char *ssid = "asrilrinaldi";
const char *password = "12345678";
//IP Address Server yang terpasang XAMPP
const char *host = "tugasakhirloker.000webhostapp.com"; //192.168.137.1
//const char *host = "192.168.137.1"; //192.168.137.1
MFRC522 mfrc522(SS_PIN, RST_PIN);
const int httpPort = 80;






void setup() {
  

  Serial.begin(9600);
 // pinMode(pinSensor, INPUT_PULLUP);
  SPI.begin();
  Wire.begin();
  lcd.begin(16,2);   // Initialize LCD 2x16
  mfrc522.PCD_Init();
  pinMode (pinrelay, OUTPUT);
  digitalWrite (pinrelay, HIGH);




  //menghidupkan lcd
  lcd.backlight(); // turn on back light
  lcd.setCursor (0,0); 
  lcd.print(" Menghubungkan "); 
  lcd.setCursor (0,4); 
  lcd.print(" Wifi "); 
  Serial.println("Menghubungkan Wifi. . . .");
  Serial.println();
  
  //menghubungkan Wifi
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("");

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //Jika koneksi berhasil, maka akan muncul address di serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println("");

  lcd.clear();
  lcd.setCursor (0,0); 
  lcd.print(" Wifi Terhubung! "); 
  Serial.println("Wifi Terhubung!");
  delay(3000);
  lcd.clear();
  lcd.setCursor (4,0);
  lcd.print("LOKER 01");
  lcd.setCursor (4,1);
  lcd.print("TERSEDIA");
  Serial.println("Tempelkan Kartu!");
  HTTPClient http;
  http.begin("http://tugasakhirloker.000webhostapp.com/loker2.php");
  int httpCode = http.GET();            //Send the request
  String payload = http.getString();    //Get the response payload from server
  cek1 = payload;
  Serial.println(httpCode);
 
  Serial.print("Cek :");    
  Serial.println(cek1);  

 


  
  
}

void loop() {
 // cekpintu();
 

  
       

  if(!mfrc522.PICC_IsNewCardPresent()){
    return;
  }
  if(!mfrc522.PICC_ReadCardSerial()){
    return;
  }

    ktp = "";
      for (byte i = 0; i < mfrc522.uid.size; i++){
        char teksBuka[3];
        sprintf(teksBuka, "%02X", mfrc522.uid.uidByte[i]);
        ktp += teksBuka;
       mfrc522.uid.uidByte[i] < 0x10 ? "0" : "";
        mfrc522.uid.uidByte[i], HEX;

      }
  if(ktp.length() == 14){
    
    lcd.clear();
    lcd.setCursor (1,0);
    lcd.print("Mohon tunggu..");
    http.begin("http://tugasakhirloker.000webhostapp.com/loker2.php");
    int httpCode = http.GET();            //Send the request
    String payload = http.getString();    //Get the response payload from server
    cek1 = payload;
    Serial.println(httpCode);
    Serial.print("KTP :");
    Serial.println(ktp);
    Serial.print("Cek :");    
    Serial.println(cek1);   
    
    
    
      if(ktp==cek1){ //kondisi 1 ====================================================================================================
        Serial.println("ktp telah digunakan");
              lcd.clear();
              lcd.setCursor (1,0);
              lcd.print("Akses ditolak!");
            
      
              delay(1000);
                http.begin("http://tugasakhirloker.000webhostapp.com/loker2.php");
    int httpCode = http.GET();            //Send the request
    String payload = http.getString();    //Get the response payload from server
    cek1 = payload;
    Serial.println(httpCode);
    Serial.print("KTP :");
    Serial.println(ktp);
    Serial.print("Cek :");    
    Serial.println(cek1); 
             

        
      
      }
      else if(uidBuka.substring(0) == ""){ //kondisi 2=============================================================================================================

       Serial.println("Membuka loker. . . .");
       Serial.print("UID Buka :");
       
        uidBuka = "";
            for (byte i = 0; i < mfrc522.uid.size; i++){
              char teksBuka[3];
              sprintf(teksBuka, "%02X", mfrc522.uid.uidByte[i]);
              uidBuka += teksBuka;
              mfrc522.uid.uidByte[i] < 0x10 ? "0" : "";
              mfrc522.uid.uidByte[i], HEX;
      
            }
           Serial.println(uidBuka);
           Serial.println("Mengirim data status. . . . .");
           
           
          lcd.clear();
          lcd.setCursor (1,0);
          lcd.print("Akses diterima");
          lcd.setCursor (1,1);
          lcd.print("Mohon tunggu");
          delay(2000);
          String url = "/write-data.php?loker=1&&status=DIGUNAKAN&&idkartu="+uidBuka;
          
  
      
    
          if (!client.connect(host, httpPort)) {
            Serial.println("connection failed");
             uidBuka = ""; //mereset loker / kartu tidak dapat digunakan lagi
             uidTutup = ""; //mereset loker / kartu tidak dapat digunakan lagi
            lcd.clear();
            lcd.setCursor (1,0);
            lcd.print("Koneksi Gagal");
            lcd.setCursor (1,1);
            lcd.print("Coba lagi");
            delay(1000);
            return;
          }

          Serial.println(host + url);
           //status loker
          client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                       "Host: " + host + "\r\n" +
                       "User-Agent: RCRemote\r\n" +
                       "Connection: close\r\n\r\n");
          Serial.println("Data status terkirim. . . . .");
          delay(500);
          
          client.stop();
          
          String url2 = "/cekloker1.php?chip="+uidBuka;
          Serial.println("Mengirim data kartu. . . . .");
    
          if (!client.connect(host, httpPort)) {
            Serial.println("connection failed");
             uidBuka = ""; //mereset loker / kartu tidak dapat digunakan lagi
             uidTutup = ""; //mereset loker / kartu tidak dapat digunakan lagi
            lcd.clear();
            lcd.setCursor (1,0);
            lcd.print("Koneksi Gagal");
            lcd.setCursor (1,1);
            lcd.print("Coba lagi");
            delay(1000);
            return;
          }
          Serial.println(host + url2);
           //status loker
          client.print(String("GET ") + url2 + " HTTP/1.1\r\n" +
                       "Host: " + host + "\r\n" +
                       "User-Agent: RCRemote\r\n" +
                       "Connection: close\r\n\r\n");
          Serial.println("Data kartu terkirim. . . . .");
          Serial.println();
          delay(20);
          http.end();
          client.stop();

             

          
          

            lcd.clear();
            lcd.setCursor (1,0);
            lcd.print("Akses diterima");
            lcd.setCursor (1,1);
            lcd.print("Selamat Datang");
            delay(1000);
            digitalWrite (pinrelay, LOW);
            delay(3000);
            digitalWrite (pinrelay, HIGH);
          
            
            lcd.clear();
            lcd.setCursor (4,0);
            lcd.print("LOKER 01");
            lcd.setCursor (0,1);
            lcd.print("TELAH DIGUNAKAN");

              http.begin("http://tugasakhirloker.000webhostapp.com/loker2.php");
    int httpCode = http.GET();            //Send the request
    String payload = http.getString();    //Get the response payload from server
    cek1 = payload;
    Serial.println(httpCode);
    Serial.print("KTP :");
    Serial.println(ktp);
    Serial.print("Cek :");    
    Serial.println(cek1); 
      
//            delay(5000);
//
//
//            cekpintu();

         
        }
     
        else if(uidBuka.substring(0) != ""){ //kondisi 3===================================================================================================
         Serial.println("Membuka loker kembali. . . . .");
         Serial.print("UID Tutup:");
         
         uidTutup = "";
          for (byte i = 0; i < mfrc522.uid.size; i++){
            char tekstutup[3];
            sprintf(tekstutup, "%02X", mfrc522.uid.uidByte[i]);
            uidTutup += tekstutup;
            mfrc522.uid.uidByte[i] < 0x10 ? "0" : "";
            mfrc522.uid.uidByte[i], HEX;
          
          }
          Serial.println(uidTutup);
          Serial.println("Mengirim data status. . . . .");
             
          if  (uidBuka.substring(0) == uidTutup.substring(0)){ //
    
          Serial.println();
          lcd.clear();
          lcd.setCursor (1,0);
          lcd.print("Akses diterima");
          lcd.setCursor (1,1);
          lcd.print("Mohon tunggu");

          // Isi Konten yang dikirim adalah alamat ip si esp -----------------------------
          
            String url = "/write-data.php?loker=1&&status=SELESAI&&idkartu="+uidTutup;
            
          
          
           if (!client.connect(host, httpPort)) {
                Serial.println("connection failed");
                lcd.clear();
                lcd.setCursor (1,0);
                lcd.print("Koneksi Gagal");
                lcd.setCursor (1,1);
                lcd.print("Coba lagi");
                delay(1000);
                return;
              }
              Serial.println(host + url);
            
              //Command for starting recording
              client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                           "Host: " + host + "\r\n" +
                           "User-Agent: RCRemote\r\n" +
                           "Connection: close\r\n\r\n");
              Serial.println("Data status terkirim. . . . .");
              delay(500);

              
           String url2 = "/hapusloker1.php";
            
            Serial.println("Menghapus data kartu. . . . .");
          
           if (!client.connect(host, httpPort)) {
                Serial.println("connection failed");
                lcd.clear();
                lcd.setCursor (1,0);
                lcd.print("Koneksi Gagal");
                lcd.setCursor (1,1);
                lcd.print("Coba lagi");
                delay(1000);
                return;
              }
            Serial.println(host + url2);
              //Command for starting recording
              client.print(String("GET ") + url2 + " HTTP/1.1\r\n" +
                           "Host: " + host + "\r\n" +
                           "User-Agent: RCRemote\r\n" +
                           "Connection: close\r\n\r\n");
              Serial.println("Data kartu terhapus. . . . .");
              Serial.println();
              delay(100);
                  
           
      
            Serial.println("");
            Serial.println("Akses diterima");
            Serial.println("");
            lcd.clear();
            lcd.setCursor (1,0);
            lcd.print("Akses diterima");
            
            lcd.setCursor (0,1);
            lcd.print("Selamat Kembali");
            digitalWrite (pinrelay, LOW);
            delay(3000);
            digitalWrite (pinrelay, HIGH);
      
      
            lcd.clear();
            lcd.setCursor (4,0);
            lcd.print("LOKER 01");
            lcd.setCursor (4,1);
            lcd.print("TERSEDIA");


            


                  uidBuka = ""; //mereset loker / kartu tidak dapat digunakan lagi
                  uidTutup = ""; //mereset loker / kartu tidak dapat digunakan lagi


               
                  Serial.println();
     
                  client.stop();


                         http.begin("https://tugasakhirloker.000webhostapp.com/loker2.php");
                int httpCode = http.GET();            //Send the request
                String payload = http.getString();    //Get the response payload from server
                cek1 = payload;
                Serial.println(cek1);
                Serial.println("update");
                Serial.println();
                Serial.println();
                delay(1000);
                  
                  
                  return ; //kembali ke kodingan awal
              
            }
            else{
              
              Serial.println("Akses ditolak");
              Serial.println("");
              lcd.clear();
              lcd.setCursor (1,0);
              lcd.print("Akses ditolak!");
              delay(1000);
      
//              lcd.clear();
//              lcd.setCursor (4,0);
//              lcd.print("LOKER 01");
//              lcd.setCursor (0,1);
//              lcd.print("TELAH DIGUNAKAN");



                http.begin("https://tugasakhirloker.000webhostapp.com/loker2.php");
                int httpCode = http.GET();            //Send the request
                String payload = http.getString();    //Get the response payload from server
                cek1 = payload;
                Serial.println(cek1);
                Serial.println("update");
                Serial.println();
                Serial.println();
                delay(1000);
            
            }
            
        }
    
  }else{
    Serial.println(ktp);
    lcd.clear();
    lcd.setCursor (2,0);
    lcd.print("Gunakan KTP-el");
    delay(2000);  


       
       
  }
      




}//end loop
     




void cekpintu(){
pinMode(pinSensor, INPUT_PULLUP);

int bacaSensor = digitalRead(pinSensor);
  if (bacaSensor == 1 && state == 0) {
    Serial.println("Pintu terbuka!");
    state = 1;
    tutup = 0;
    delay(5000);
     // Isi Konten yang dikirim adalah alamat ip si esp -----------------------------
    
      String url = "/update-data.php?status=TERBUKA&&loker=1";
      
    
     if (!client.connect(host, httpPort)) {
          Serial.println("connection failed");
          delay(1000);
          return;
        }
      
        //Command for starting recording
        client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                     "Host: " + host + "\r\n" +
                     "User-Agent: RCRemote\r\n" +
                     "Connection: close\r\n\r\n");
        Serial.println("Triggering");
        delay(20);
     


            delay(1000);
            Serial.println();

//            ESP.restart();

            client.stop();
            
            
            return ; //kembali ke kodingan awal
        
      

  }
  else if (bacaSensor == 0 && tutup == 0) {
    Serial.println("Pintu tertutup.");
    state = 0;
    tutup = 1;
    delay(5000);

       String url = "/update-data.php?status=TERTUTUP&&loker=1";
      
    
     if (!client.connect(host, httpPort)) {
          Serial.println("connection failed");
          delay(1000);
          return;
        }
      
        //Command for starting recording
        client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                     "Host: " + host + "\r\n" +
                     "User-Agent: RCRemote\r\n" +
                     "Connection: close\r\n\r\n");
        Serial.println("Triggering");
        delay(20);



            delay(1000);
            Serial.println();

//            ESP.restart();

            client.stop();
            
            
            return ; //kembali ke kodingan awal
        
      

  }
  
}
