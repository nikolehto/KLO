# KLO
Käyttöliittymäohjelmointi projekti
Kodinohjausjärjestelmän visualisointi

1. Taustalle voi ladata pohjapiirrustuksen, tai muun käyttäjän valitseman kuvan
2. Jokaista ohjattavaa laitetta (ja laitteen tilaa) vastaa kuvake. Ohjausten tila luetaan data.json tiedostosta.
3. Sijoitetaan jokaista laitetta vastaava kuva oikeaan sijaintiin (variables.json sisältää tiedon kuvasta ja tilasta)
4. Käyttäjä voi ladata pohjapiirrustusta vastaavan kuvan palvelimelle
5. Käyttäjä voi muuttaa laitetta vastaavan kuvan sijaintia, sijainti tallennetaan variables.json tiedostoon

Jokaisella sivun latauskerralla verrataan data.json ja variables.json tiedoston avaimia, jos havaitaan ero niin variables.json alustetaan ja ohjataan käyttäjä muokkaus sivulle.

Palvelimella on oletuskuvia laitteille.

Kodinohjausjärjestelmän vaatimuksena on että siltä saadaan laitetunnus, sekä laitteen tila ja kirjoittaa tilat palvelimelle data.json tiedostoon muodossa {laitetunnus:tila}
