<?php
$fp = fopen("counter.txt", "r+");

while(!flock($fp, LOCK_EX)) {  // acquire an exclusive lock
    // waiting to lock the file
}

$counter = intval(fread($fp, filesize("counter.txt")));
$counter++;

ftruncate($fp, 0);      // truncate file
fwrite($fp, $counter);  // set your data
fflush($fp);            // flush output before releasing the lock
flock($fp, LOCK_UN);    // release the lock

fclose($fp);
?>
<html>
  <head>
    <title>Generazione Auto Certificazione Online</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>
  <body>
    <div class="row">
      <div class="col-12 col-sm-6 offset-sm-3">
        <header>
          <img src="img/logo.svg" style="margin-bottom:45px" />
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
    <p class="bold h1-size">
      Autodichiarazione ai sensi degli artt. 46 r 47 del D.P.R. 28 Dicembre
      2000, N. 4
    </p>
    <div class="margin-top-default"></div>
    <div class="row">
      <div class="col-12 col-sm-3">
        <p class="title-input margin-top-default">
          Il sottoscritto / La sottoscritta
        </p>
        <input
          class="custom-input"
          id="nome"
          type="text"
          placeholder="Nome e Cognome"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">Nato/a il</p>
        <input
          class="custom-input"
          id="nato-il"
          type="text"
          placeholder="Data di nascita GG/MM/AAAA"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">a</p>
        <input
          class="custom-input"
          id="a"
          type="text"
          placeholder="Luogo di nascita"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">Residente in</p>
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
        <p class="title-input">Via</p>
        <input
          class="custom-input"
          id="via"
          type="text"
          placeholder="Via di residenza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">Identificato a mezzo</p>
        <input
          class="custom-input"
          id="mezzo-id"
          type="text"
          placeholder="Identificato a mezzo"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">Nr.</p>
        <input
          class="custom-input"
          id="numero"
          type="text"
          placeholder="Numero"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">Utenza telefonica</p>
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
        <p class="title-input margin-top-default">
          Di essere in transito da
        </p>
        <input
          class="custom-input"
          id="luogo-di-partenza"
          type="text"
          placeholder="Luogo di partenza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">proveniente da</p>
        <input
          class="custom-input"
          id="luogo-di-provenienza"
          type="text"
          placeholder="Luogo di provenienza"
        />
      </div>
      <div class="col-12 col-sm-3">
        <p class="title-input">e diretto a</p>
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
        <p class="title-input">Che il viaggio è determinato da:</p>
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
        <p class="title-input">A questo riguardo, dichiaro che:</p>
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
    <div class="textcenter" style="margin-top: 25px;">
    <!-- Pusalnte Dona PayPal-->
    <span style="font-size: 14px;margin-bottom: 10px;">Se vuoi offrirci un caffé perchè ti è stato utile clicca qui!</span>
    <form
      action="https://www.paypal.com/cgi-bin/webscr"
      method="post"
      style="margin-bottom: 0;margin-top: 15px;"
      target="_top"
    >
      <input type="hidden" name="cmd" value="_s-xclick" />
      <input type="hidden" name="hosted_button_id" value="PDWXTYNHQUHMC" />
      <input
        type="image"
        src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_donate_SM.gif"
        border="0"
        name="submit"
        title="PayPal - The safer, easier way to pay online!"
        alt="Fai una donazione con il pulsante PayPal"
      />
      <img
        alt=""
        border="0"
        src="https://www.paypal.com/it_IT/i/scr/pixel.gif"
        width="1"
        height="1"
      />
    </form>
  </div>
    <footer>
      <p class="" style="margin-bottom:5px">
        Questo è il nostro contributo per gli italiani.   &nbsp;Powered by
        <a class="bold" target="_blank" href="https://slumdesign.com">Slum</a>.
      </p>
      Il codice sorgente è pubblico e sotto licenza GNU General Public License
      v3.0. Il progetto lo trovi
      <a
        class="bold"
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
