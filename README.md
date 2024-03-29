# CLIENT COVID PLATFORM

Il progetto si occupa della parte di front-end relativa alla piattaforma di visualizzazione ed elaborazione dati riguardo al Covid-19.

In particolare ha il compito di chiedere i dati alla api appositamente sviluppata e visualizzarli sottoforma di grafici e tabelle,
consentendo all'utente di registrarsi e loggarsi e permettendo agli utenti amministratori di aggiungere, modificare o eliminare dati dal database.

Per la parte relativa a JavaScript, il progetto implementa la libreria open-source chart.js per la visualizzazione dei dati sotto forma di grafici
(https://cdn.jsdelivr.net/npm/chart.js)

## INSTALLAZIONE

Per eseguire correttamente il progetto è necessario avere installata sulla macchina una versione recente di PHP, per eseguire il progetto da terminale inserire il codice:

  ```
  php -S localhost:8002
  ```

N.B. è consigliabile lasciare libera la porta 8001 poichè il client è strutturato per interagire con le api attraverso richieste verso questa porta. 

Per visualizzare i dati è necessario avere in esecuzione le api adeguate per il progetto, per info: https://github.com/scio97/apiCovidPlatform

# UTILIZZO

