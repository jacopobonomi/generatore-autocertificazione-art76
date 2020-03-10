const { degrees, PDFDocument, rgb, StandardFonts } = PDFLib;

//Trasforma una stringa in array di parole.
string_to_array = function(str) {
  return str.trim().split(" ");
};

//Scrive il testo fomrattandolo in base al limite di caratteri
scriviTesto = async function(testo, limite, pagina, font,x,y) {
  let arrayOfWord = string_to_array(testo);
  let righe = [];
  let countAppoggio = 0;
  let indiceRighe = 0
  let yPage = y;
  for (let i = 0; i < arrayOfWord.length; i++) {
    countAppoggio += arrayOfWord[i].length;
    if (countAppoggio <= limite) {
      if (righe[indiceRighe]) {
        righe[indiceRighe] += " " + arrayOfWord[i];
      } else {
        righe[indiceRighe] = arrayOfWord[i];
      }
    } else {
      countAppoggio = 0;
      indiceRighe = indiceRighe + 1;
      righe[indiceRighe] = arrayOfWord[i];
    }
  }
  righe.forEach(riga => {
    pagina.drawText(riga, {
      x: x,
      y: yPage - 12,
      size: 12,
      font: font,
      color: rgb(0, 0, 0),
      rotate: degrees(0)
    });
    yPage = yPage - 15;
  });
  return yPage;
};
//Prendo tutti i valori al Click e controllo che non siano di lunghezza minore di 1.
getValoriFromPage = function (){
  const utenzaTelefonica=document.getElementById("utenza-telefonica").value;
  const numero=document.getElementById("numero").value;
  const mezzoId=document.getElementById("mezzo-id").value;
  const via=document.getElementById("via").value;
  const residenteIn=document.getElementById("residente-in").value;
  const a=document.getElementById("a").value;
  const natoIl=document.getElementById("nato-il").value;
  const nome=document.getElementById("nome").value; 
  const dichiarazione = document.getElementById("dichiarazione").value;
  const viaggio = document.getElementById("viaggio").value;
  const luogoDiDestinazione=document.getElementById("luogo-di-destinazione").value; 
  const luogoDiProvenienza = document.getElementById("luogo-di-provenienza").value;
  const luogoDiPartenza = document.getElementById("luogo-di-partenza").value;
  if(!viaggio || utenzaTelefonica.length<=1 || dichiarazione.length<=1 || numero.length<=1 || mezzoId.length<=1 || via.length<=1 || residenteIn.length<=1 || a.length<=1 || natoIl.length<=1 || nome.length<=1 ){
    alert("Problema nei dati inseriti");
    return false;
  }
  const valori={
    luogoDiDestinazione,
    luogoDiPartenza,
    luogoDiProvenienza,
    viaggio,
    dichiarazione,
    utenzaTelefonica,
    numero,
    mezzoId,
    via,
    residenteIn,
    a,
    natoIl,
    nome
  }
  return valori;
}
//Genero il PDF con le informazioni prese in input.
generaAutoCertificazione = async function() {
  const valori = getValoriFromPage();
  
  if(!valori){
    return false;
  }
  const url ="https://autodichiarazione-online.it/Modulo-modificato.pdf";
  const existingPdfBytes = await fetch(url).then(res => res.arrayBuffer());
  const pdfDoc = await PDFDocument.load(existingPdfBytes);
  const pages = pdfDoc.getPages();
  const firstPage = pages[0];
  
  const helveticaFont = await pdfDoc.embedFont(StandardFonts.Helvetica);
  const helveticaBoldFont = await pdfDoc.embedFont(StandardFonts.HelveticaBold);
  const { width, height } = firstPage.getSize();

  //Scrivo l'articolo in grassetto
  let testo =
  `Il sottoscritto ${valori.nome} nato il ${valori.natoIl} a ${valori.a}, residente in ${valori.residenteIn}, via ${valori.via}, identificato a mezzo ${valori.mezzoId} nr.${valori.numero} utenza telefonica ${valori.utenzaTelefonica}, consapevole delle conseguenze penali previste in caso di dichiarazioni mendaci a pubblico ufficiale`;
  let y = await scriviTesto(testo, 67,firstPage, helveticaFont,60,height / 2 + 190);
  const grassetto = "(art. 76 D.P.R. n. 445/2000 e art 495 c.p.)";
  firstPage.drawText(grassetto, {
    x: 60,
    y: y - 15,
    size: 12,
    font: helveticaBoldFont,
    color: rgb(0, 0, 0),
    rotate: degrees(0)
  });

  let destinazione = `Di essere in transito da ${valori.luogoDiPartenza} proveniente da ${valori.luogoDiProvenienza} e diretto a ${valori.luogoDiDestinazione}`;
  y=await scriviTesto(destinazione, 60,firstPage, helveticaFont,103,y-76 );
  //Check dello spostamento
  const svgPath ='M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z'
  firstPage.moveTo(107, firstPage.getHeight() - 5)  
  firstPage.moveDown(495)  
  switch (parseInt(valori.viaggio)) {
    case 1:
      firstPage.drawSvgPath(svgPath)
      break;
    
    case 2:
      firstPage.moveDown(17)
      firstPage.drawSvgPath(svgPath)    
      break;
    
    case 3:
      firstPage.moveDown(34)
      firstPage.drawSvgPath(svgPath)
      break;
    
    case 4:
      firstPage.moveDown(51)    
      firstPage.drawSvgPath(svgPath)
      break;
  }

  //Scrivo le note
  let note = `A questo riguardo, dichiaro che ${valori.dichiarazione}`;
  y = await scriviTesto(note, 70,firstPage, helveticaFont,60,y-250);

  const pdfBytes = await pdfDoc.save();
  download(pdfBytes, "Autodichiarazione.pdf", "application/pdf");
};
