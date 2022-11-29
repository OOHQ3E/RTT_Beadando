#########################################################################################################################################################################
#   
#   Üdvözlet!                                                                                                                          
#                                                                                                                                    
#   Ez az OOHQ3E neptunkódú hallgató Webprogramozás II. gy beadandójához készült "kis" leírás.                                           
#                                                                                                                                    
# 	- Az oldal témája alkotások/képek lettek, jelenleg a saját munkáimból válogattam ki képeket, azok jelennek meg az oldalon.       
#	- Az adatbázis, amit az oldal használ, megtalálható a mappán belül oohq3e.sql néven.                                             
# 	- Az oldal bejelentkezésnél kér jelszót és felhasználó nevet, és egy ellenőrző kódot. (ellenőrzött adatbevitelˇ*)                
# 	- Ha az oldal látogatója nincs még regisztrálva, megteheti azt is.                                                               
#                                                                                                                                   
#   A regisztrációhoz szükséges:                                                                                                                     
#	    - Profilkép                                                                                                                      
#	    - Felhasználónév:
#           - Ha már van ugyan azzal a felhasználónévvel felhasználó a rendszerben értesít, majd visszavisz a regisztrációs oldalra                                                                                                                
#	    - E-mail cím: 
#           - Ha már van ugyan azzal a e-mail címmel felhasználó a rendszerben értesít, majd visszavisz a regisztrációs oldalra                                                                                                                      
#	    - Jelszó                                                                                                                          
#	    - Ellenőrző kód beírása                                                                                                          
#                                                                                                                                    
#   Ellemőrzött adatbevitelˇ*, nem engedi üresen hagyni a szükséges adatokat.                                                         
#                                                                                                                                    
#   ˘* ^*(pl.: ha valahova csak betűket lehet írni, akkor mást nem enged. Bejelentkezésnél és regisztrációnál,                        
#        ha az ellenőrzőkód ha hibás, erről értesíti a felhasználót, és visszadobja a legutóbbi oldalra)                             
#                                                                                                                                    
#########################################################################################################################################################################
# A rendszerbe általam felvett felhasználók bejelentkezéséhez szükséges adatok:                                                                
#                                                                                                                                    
#   admin:                                                                                                                             
#	    - Felhasználónév: admin                                                                                                          
#	    - Jelszó:         admin                                                                                                          
#                                                                                                                                    
#   moderátor:                                                                                                                         
#   	- Felhasználónév: mod                                                                                                            
#   	- Jelszó:         mod                                                                                                            
#                                                                                                                                      
#   alap felhasználók:                                                                                                                 
#   	- Felhasználónév: user                                                                                                           
#   	- Jelszó:         user                                                                                                           
#                                                                                                                                      
#   	- Felhasználónév: user2                                                                                                          
#   	- Jelszó:         user2                                                                                                          
#                                                                                                                                      
#   	- Felhasználónév: user3                                                                                                          
#   	- Jelszó:         user3                                                                                                          
#                                                                                                                                    
#########################################################################################################################################################################
# Úgy lett megoldva a jogosultsági rendszer, hogy a felhasználók a következő menüpontokat láthatják:                                 
#                                                                                                                                    
#   admin:                                                                                                                             
#	    Az összes oldalt látja, ezek az alábbiak:                                                                                        
#		    - Saját oldal                                                                                                                
#		    - Összes felhasználó a rendszerben                                                                                           
#		    - Képgaléria                                                                                                                 
#		    - Új Kép Felvétele                                                                                                           
#		    - Képek törlése a Galériából                                                                                                 
#		    - Képek keresése a Galériában                                                                                                
#		    - Képek adatainak módosítása                                                                                                 
#                                                                                                                                   
#   moderátor:                                                                                                                         
#	    - Saját oldal                                                                                                                    
#	    - Képgaléria                                                                                                                     
#	    - Új Kép Felvétele                                                                                                               
#	    - Képek törlése a Galériából                                                                                                     
#	    - Képek keresése a Galériában                                                                                                    
#	    - Képek adatainak módosítása                                                                                                     
#                                                                                                                                    
#   alap felhasználók:                                                                                                                 
#	    - Saját oldal                                                                                                                    
#	    - Képgaléria                                                                                                                     
#	    - Képek keresése a Galériában                                                                                                    
#                                                                                                                                    
#########################################################################################################################################################################
#                                                                                                                                    
# Menüpontok leírása:                                                                                                                
#                                                                                                                                    
#########################################################################################################################################################################
#
#	Saját oldal:                                                                                                                     
#		- Az adott felhasználó láthatja a saját profilképét, felhasználónevét, és emailjét.                                          
#		- Az adott oldalon lehetséges a felhasználónak a saját adatait módosítani: 
#                                      
#				- Jelszót: szükséges a jelenlegi jelszót megadni és egy új jelszót a változtatáshoz. (ellenőrzött bevitel^*)          
#						- Ha nem egyezik meg a jelenlegi jelszó azzal, ami be lett kérve, hibát dob.                                   
#				- Profilképet: választhat egy tetszőleges képet a számítógépéről, amit a régi helyett használna. (a régi kép törlődik a mappából)                     
#				- E-mail címet: szükséges a jelenlegi e-mail címet megadni és egy új címet a változtatáshoz. (ellenőrzött bevitel^*)  
#						- Ha nem egyezik meg a jelenlegi e-mail cím azzal, ami be lett kérve, hibát dob.      
#                         
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#
#   Összes Felhasználó:                                                                                                              
#		- Megjeleníti az összes felhasználót,(akik a rendszerben vannak) azoknak a jelenlegi profilképét,                            
#         felhasználónevét és e-mail címét kártyákon.                                                                                 
#		- Van lehetőség rendezésre felvétel ideje szerint a régiektől, a legújabbakig.                                                
#		- Van lehetőség a lapozásra, 6 felhasználónként van egy új oldal.                 
#                                            
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#
#	Képgaléria:                                                                                                                      
#		- Megjeleníti a rendszerben az összes felvett képet (amik a rendszerben vannak), azoknak az adatait kiírva kártyákon:        
#				- Alkotás képe                                                                                                       
#				- Alkotás címe                                                                                                       
#				- Alkotás mérete(cm-ben szélesség x magasság)                                                                        
#				- Készítés dátuma                                                                                                    
#				- Készítési technika                                                                                                 
#				- Készítőjének a neve                                                                                                
#		- Lehetőség van itt is rendezésre, és lapozásra mint fentebb az összes felhasználóknál is.    
#                                
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#
#	Új kép felvétele a rendszerbe:                                                                                                   
#		- Lehetőség van a megadott felhasználóknak(admin és moderátor) egy új képet felvenni a galériába.                             
#		- Ki kell választani a képet, amit szeretne, ennek az adatait felvenni. (fentebb leírt adatokat)   
#       - Ha van egy ugyan olyan című kép a rendszerben, akkor erről értesít az oldal, majd visszaugrik az előző részre.                            
#		- Ellenőrzött adatbevitel^*      
#                                                                                            
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#
#	Kép törlése a galériából:                                                                                                        
#		- A képek egyenként jelennek meg nagy méretben, az adataival a kártyákon.                                                     
#		- A törléshez szükséges beírni az alkotás nevét jóváhagyás céljából:
#            - ha nem egyezik meg az alkotás címe azzal amit beírt, értesít a hibáról, és visszadob ahhoz a képhez.                                                                            
#		- Ha a kép törlése sikeres, visszadob a képek törlésének első oldalához.                                                      
#		- Lapozás lehetséges.                                                                                                          
#
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	
#    Kép Keresése a galériában:                                                                                                       
#		- Be kell írni egy keresési szót, majd azt az alkotások címei alapján kiadja azokat,                                         
#         amiket talált kártyákon minden adattal rajta.     
#                                                                          
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#	                                                                                                                                 
#	Kép adatainak módosítása                                                                                                         
#		- A képek egyenként jelennek meg nagy méretben, az adataival a kártyákon.                                                     
#		- A módosításhoz be kell írni az új adatot, majd miután sikerül az adat módosítás,                                           
#		  visszadob az adott képhez, amit legutóbb módosítva lett. 
#       - Új cím nem egyezhet meg egy már rendszerben szereplő kép címével.  
#       - Kép változtatása esetén a régi törlődik, nehogy megteljeljen a tárhely sok változtatás esetén.                                                                 
#		- Ellenőrzött adatbevitel*^                                                                                                  
#		- Lapozás lehetséges                                                                                                         
#                                                                                                                                    
#########################################################################################################################################################################
	