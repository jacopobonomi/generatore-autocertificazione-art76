<?php
$fp = fopen("counter.txt", "r+");

while(!flock($fp, LOCK_EX)) {  
}
$counter = intval(fread($fp, filesize("counter.txt")));
$counter++;
ftruncate($fp, 0);  
fwrite($fp, $counter);
fflush($fp);    
flock($fp, LOCK_UN);
fclose($fp);
?>
<!DOCTYPE html>
<html lang="it" prefix="og: http://ogp.me/ns#">
  <head>
    <title>Generazione Auto Certificazione Online</title>
    <meta charset="utf-8" />
    <meta name ="description" content="1.Compila, 2 Scarica, 3 Stampa l'autodichiarazione per gli spostamenti. L'unico tool open source per la generazione online dell'autodichiarazione. Ai sensi degli artt. 46 r 47 del D.P.R. 28. "/>
    <meta name ="keywords" content="autodichiarazione, artt 46, artt 47, D.P.R. 28,"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Jacopo Bonomi" />
    <meta property="og:url"                content="https://autodichiarazione-online.it/" />
    <meta property="og:title"              content="Autodichiarazione online PDF gratis" />
    <meta property="og:description"        content="1.Compila, 2 Scarica, 3 Stampa l'autodichiarazione per gli spostamenti." />
    <meta property="og:image"              content="https://autodichiarazione-online.it/img/facebook-logo.png" />
    <meta property="og:type"              content="website" />
    <meta property="og:image:width"              content="250" />
    <meta property="og:image:height"              content="200" />
    <link rel="icon" href="/img/favicon.ico" />
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
    <div class="row">
      <div class="col-12 col-sm-6 offset-sm-3">
        <header>
          <img alt="logo generazione certificazione online" src="img/logo.svg" style="margin-bottom:45px" />
        </header>
        <div class="istruzione">
          <p><span class="bold">1.</span> Compila l'autodichiarazione</p>
          <p><span class="bold">2.</span> Scarica il PDF</p>
          <p>
            <span class="bold">3.</span> Stampa il PDF e
            <span class="underline">firmalo</span>
          </p>
        </div>
      </div>
    </div>
    <br />
    <p class="bold h1-size" style="margin-top:15px">
      Autodichiarazione ai sensi degli artt. 46 r 47 del D.P.R. 28 Dicembre
      2000, N. 445
    </p>
    <div class="margin-top-default"></div>
    <div class="row">
      <div class="col-12 col-sm-3">
        <label for="nome" class="title-input margin-top-default">
          Il sottoscritto / La sottoscritta
        </label>
        <input
          class="custom-input"
          id="nome"
          type="text"
          placeholder="Nome e Cognome"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="nato-il" class="title-input">Nato/a il</label>
        <input
          class="custom-input"
          id="nato-il"
          type="text"
          placeholder="Data di nascita GG/MM/AAAA"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="a" class="title-input">a</label>
        <input
          class="custom-input"
          id="a"
          type="text"
          placeholder="Luogo di nascita"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="residente-in" class="title-input">Residente in</label>
        <input
          class="custom-input"
          id="residente-in"
          type="text"
          placeholder="Città di residenza"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-3">
        <label for="via" class="title-input">Via</label>
        <input
          class="custom-input"
          id="via"
          type="text"
          placeholder="Via di residenza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="mezzo-id" class="title-input">Identificato a mezzo</label>
        <input
          class="custom-input"
          id="mezzo-id"
          type="text"
          placeholder="Identificato a mezzo"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="numero" class="title-input">Nr.</label>
        <input
          class="custom-input"
          id="numero"
          type="text"
          placeholder="Numero"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="utenza-telefonica" class="title-input">Utenza telefonica</label>
        <input
          class="custom-input"
          id="utenza-telefonica"
          type="text"
          placeholder="Numero telefonico"
        />
      </div>
    </div>
    <p class="margin-top-default">
      consapevole delle conseguenze penali previste in caso di dichiarazioni
      mendaci a pubblico ufficiale
      <span class="bold">(art 495 c.p.)</span>
    </p>
    <br />
    <p class="title underline">Dichiara sotto la propria responsabilità</p>
    <br />
    <div class="row">
      <div class="col-12 col-sm-3">
        <label for="luogo-di-partenza" class="title-input margin-top-default">
          Di essere in transito da
        </label>
        <input
          class="custom-input"
          id="luogo-di-partenza"
          type="text"
          placeholder="Luogo di partenza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="luogo-di-provenienza" class="title-input">proveniente da</label>
        <input
          class="custom-input"
          id="luogo-di-provenienza"
          type="text"
          placeholder="Luogo di provenienza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <label for="luogo-di-destinazione" class="title-input">e diretto a</label>
        <input
          class="custom-input"
          id="luogo-di-destinazione"
          type="text"
          placeholder="Luogo di destinazione"
        />
      </div>
    </div>
    <p class="margin-top-default">
      <span class="bold"
        >Di essere a conoscenza delle misure di contenimento del contagio di cui
        all’art. 1, comma 1, del Decreto del Presidente del Consiglio dei
        Ministri del 9 marzo 2020 concernenti lo spostamento delle persone
        fisiche all’interno di tutto il territorio nazionale, nonché delle
        sanzioni previste dall’art. 4, comma 1, del Decreto del Presidente del
        Consiglio dei Ministri dell’ 8 marzo 2020 in caso di inottemperanza
        (art. 650 C.P. salvo che il fatto non costituisca più grave reato)</span
      >
    </p>
    <div class="row">
      <div class="col-12 col-sm-4">
        <label for="viaggio" class="title-input">Che il viaggio è determinato da:</label>
        <select
          class="custom-input"
          id="viaggio"
          type="select"
          placeholder="Inserisci il tuo nome"
        >
          <option value="1">Comprovate esigenze lavorative</option>
          <option value="2">Situazioni di necessità</option>
          <option value="3">Motivi di salute</option>
          <option value="4"
            >Rientro presso il proprio domicilio, abitazione o residenza</option
          >
        </select>
      </div>
      <div class="col-12 col-sm-8">
        <label for="dichiarazione" class="title-input">A questo riguardo, dichiaro che:</label>
        <textarea
          id="dichiarazione"
          cols="30"
          rows="2"
          placeholder="(Lavoro presso…, sto rientrando al mio domicilio sito in…, devo effettuare una visita medica … altri motivi particolari… etc…)"
        ></textarea>
      </div>
    </div>
    <div class="row margin-top-default">
      <div class="col-12 col-sm-4 offset-sm-4">
        <div class="margin-top-default">
          <button
            class="margin-top-default"
            onclick="generaAutoCertificazione()"
          >
            Scarica PDF
          </button>
        </div>
      </div>
    </div>

    <footer>
      <p class="" style="margin-bottom:5px">
        Questo è il nostro contributo per gli italiani.   &nbsp;Powered by
        <a class="bold" target="_blank" rel="noreferrer" href="https://slumdesign.com">Slum</a>.
      </p>
      Il codice sorgente è pubblico e sotto licenza GNU General Public License
      v3.0. Il progetto lo trovi
      <a
        class="bold"
        rel="noreferrer"
        target="_blank"
        href="https://github.com/jacopobonomi/generatore-autocertificazione-art76"
        >qui</a
      >
      <br />
      <br />
    </footer>
  </body>
  <script>
    if (window.location.protocol !== "https:") {
      window.location =
        "https://" +
        window.location.hostname +
        window.location.pathname +
        window.location.hash;
    }
  </script>
  <script type="text/javascript" src="js/generaPDF.js"></script>
</html>
