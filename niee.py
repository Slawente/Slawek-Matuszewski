import random

class Gracz:
    def __init__(self, HP, ATK, DEFF):
        self.HP = HP
        self.ATK = ATK
        self.DEFF = DEFF
            
    def attack(self, Opponent, DEFF):
        if(DEFF > 4):
            Opponent.HP -= self.ATK
       
    def heal(self):
        heal = random.randint(1, 10)
        if(heal == 1):
            self.HP += 25
            
class Opponent:
    def __init__(self, HP, ATK, DEFF):
        self.HP = HP
        self.ATK = ATK
        self.DEFF = DEFF
            
    def attack(self, Gracz, DEFF):
        if(DEFF > 4):
            Gracz.HP -= self.ATK
       
    def heal(self):
        heal = random.randint(1, 10)
        if(heal == 1):
            self.HP += 25
            
            
gracz1 = Gracz(100, 10, random.randint(1, 10))
opponent1 = Opponent(100, 10, random.randint(1, 10))
akcja = int(input("Podaj cyfrę aby wykonać akcję: 1 - Atak, 2 - Ulecz"))

    
while gracz1.HP > 0 or opponent1.HP > 0:
    if akcja == 1:
        gracz1.attack(opponent1)
        print("Ilość  zdrowia przeciwnika" + opponent1.HP)
    
    if akcja == 2:
        gracz1.heal(gracz1)
        print("ilość zdrowia gracza" + gracz1.HP)