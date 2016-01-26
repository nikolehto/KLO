# KLO
Käyttöliittymäohjelmointi projekti
Kodinohjausjärjestelmän visualisointi

Taustalle voi ladata pohjapiirrustuksen, tai muun käyttäjän valitseman kuvan
Jokaista ohjattavaa laitetta (ja laitteen tilaa) vastaa kuva(canvas elementti)
Luetaan laitteiden tila data.json tiedostosta.
Sijoitetaan jokaista laitetta vastaava kuva oikeaan sijaintiin (variables.json sisältää tiedon kuvasta ja tilasta)
Käyttäjä voi ladata pohjapiirrustuksen, tai laitetta vastaavan kuvan palvelimelle
Käyttäjä voi muuttaa laitetta vastaavan kuvan sijaintia, sijainti tallennetaan variables.json tiedostoon

Jokaisella sivun latauskerralla verrataan data.json ja variables.json tiedoston avaimia, jos havaitaan ero niin variables.json alustetaan ja ohjataan käyttäjä muokkaus sivulle.

Palvelimella on oletuskuvia laitteille.

Kodinohjausjärjestelmä on erillinen osa, jonka oletetaan kirjoittavan laitteiden nimet sekä tilat (key, value) data.json tiedostoon
