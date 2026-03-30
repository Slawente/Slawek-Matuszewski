class Pracownik:
    def __init__(self,idPr,wiekPr,imiePr,nazwiskoPr,pensjaPr):
        self.id = idPr
        self.wiek = wiekPr
        self.imie = imiePr
        self.nazwisko = nazwiskoPr
        self.pensja = pensjaPr

class Klient:
    def __init__(self,idK,imieK,nazwiskoK,miastoK):
        self.id = idK
        self.imie = imieK
        self.nazwisko = nazwiskoK
        self.miasto = miastoK

class Produkty:
    def __init__(self,nazwaP,cenaP,idP):
        self.nazwa = nazwaP
        self.cena = cenaP
        self.id = idP

class Magazyn:
    def __init__(self,lokalizacjaM,pojemnoscM,idM):
        self.lokalizacja = lokalizacjaM
        self.pojemnosc = pojemnoscM
        self.id = idM

class Zamowienie:
    def __init__(self, idZ, klient, produkt, pracownik, ilosc):
        self.id = idZ
        self.klient = klient
        self.produkt = produkt
        self.pracownik = pracownik
        self.ilosc = ilosc

    def wartosc(self):
        return self.ilosc * self.produkt.cena

    def pokaz(self):
        print(f"Zamówienie {self.id}: {self.klient.imie} {self.klient.nazwisko} kupił {self.ilosc}x {self.produkt.nazwa} (Pracownik: {self.pracownik.imie}) Wartość: {self.wartosc()} zł")


Konstantyn = Pracownik("p1", "Konstantyn", "Wielkopolan", 0)
Juliusz = Pracownik("p2", "Juliusz", "Cezariusz", 1200)
Rychu = Pracownik("p3", "Rychu", "Remsuowicz", 3000)

k1 = Klient(1,"Bolesław","Bierut","Petersburg")
k2 = Klient(2,"Kamil","Stoch","Zeby")
k3 = Klient(3,"Wacław","Wacławski","Warszawa")
k4 = Klient(4,"Tomasz","Karolak","Wszędzie")
k5 = Klient(5,"Pan","Szczesniak","Warszawa")
k6 = Klient(6,"Kupiec","Korzenny","Flotsam")

pr1 = Produkty("Laptop",3000,1)
pr2 = Produkty("Telefon",1500,2)
pr3 = Produkty("Myszka",100,3)
pr4 = Produkty("Ziemniak",5,4)
pr5 = Produkty("Czteropak",15,5)
pr6 = Produkty("Szafa grająca",10000,6)

m1 = Magazyn("Warszawa",1000,1)
m2 = Magazyn("Kraków",500,2)

import random

pracownicy = [p1, p2, p3, p4]
klienci = [k1, k2, k3, k4, k5, k6]
produkty = [pr1, pr2, pr3, pr4, pr5, pr6]

zamowienia = []

for i in range(1, 101):
    klient = random.choice(klienci)
    produkt = random.choice(produkty)
    pracownik = random.choice(pracownicy)
    ilosc = random.randint(1, 10)
    z = Zamowienie(i, klient, produkt, pracownik, ilosc)
    zamowienia.append(z)

for z in zamowienia:
    z.pokaz()

def pokaz_menu():
    print("Jakiś panel co będzie")
    print("1. Pokaż wszystkie zamówienia")
    print("2. Pokaż zamówienia danego klienta")
    print("3. Pokaż zamówienia danego pracownika")
    print("4. Pokaż najdroższe zamówienie")
    print("5. Dodaj zamówienie")
    print("6. Usuń zamówienie")
    print("7.")

pokaz_menu()