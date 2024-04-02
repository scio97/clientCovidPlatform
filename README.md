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

Una volta avviato il progetto, collegandosi via browser all'indirizzo specificato durante l'esecuzione (localhost:8000),
sarà mostrata la pagina principale della webapp che da una panoramica generale dei dati a livello nazionale.

<div align="center">
  <img width="1901" alt="Senza titolo" src="https://github.com/scio97/clientCovidPlatform/assets/56976553/8bac8193-d0dd-4520-b231-3f10a262322f">
</div>

Oltre ai vari grafici/tabelle presenti al centro pagina, è presente un menu a sinistra che consente di aprire le varie sezioni relative alle singole regioni/provincie autonome,
aprendo queste ultime vengono visualizzati i dati relativi alla regione/provincia autonoma selezionata.

Sulla barra presente nella parte alta della pagina è possibile registrarsi o accedere con due tipologie di account: ospite o amministratore,
con l'account ospite ad oggi non è possibile fare nulla di più rispetto ad un utente non loggato mentre con l'account amministratore vi è la possibilità di modificare i dati nel database.

<div align="center">
  <img width="1603" alt="Senza titolo" src="https://github.com/scio97/clientCovidPlatform/assets/56976553/be404df8-2a85-43f4-af4a-4be10e9c3330">
</div>

Queste modifiche saranno poi visualizzabili nella pagina utente che mostra l'intera cronologia delle modifiche effettuate dall'utente loggato con la possibilità di annullarle.

<div align="center">
  <img width="1903" alt="Senza titolo" src="https://github.com/scio97/clientCovidPlatform/assets/56976553/dc8a30f3-8585-4f63-8b93-2f83d05805ff">
</div>

