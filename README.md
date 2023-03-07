Välkommen till mitt `To-Do-Projekt!`

För att komma igång behöver du först se till att du har Docker installerat samt se till att Docker körs i Docker desktop. I `docker-compose.yml` - filen finns nödvändig information om exempelvis host, databas, port och vilken databashanterare som används. Även användarnamn och lösenord finns tillgänglig för att komma åt dataasen.

I detta "scenario" har jag valt att skapa en fiktiv sida för lägenheter som behöver städas i ett hotell, nämligen i `"Hotell Chas"`!
Du kommer agera chef på hotellet med de passande uppgifterna:
```
Användarnamn: chefen
Lösenord: 1234
```

Den första sidan du ska besöka nu är `localhost/loginchas.php`.
Du loggar nu in med dina chefsliga auktoritära uppgifter, och badabim badabom:
Här kan du nu se alla lägenheter som behöver städas!
På varje lägenhet kan du nu:

- Uppdatera
- Markera som `Städad` eller `Ej klar`
- Ta bort

Längst ner på sidan kan du även `Lägg till lägenhet` som behöver städas och till sist, när du är klar för dagen, logga ut!