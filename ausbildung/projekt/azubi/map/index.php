<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Map</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css"/>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <select name="mySelect" id="mySelect">
      <option value="49.66635549999999,8.353069699999999">Choose an option</option>
    </select>
    <br>
    <button type="submit" name="submit">Suchen</button>
  </form>

    <?php
      if(isset($_POST["mySelect"])){
        $cords = $_POST["mySelect"];
      } else {
        $cords = "49.66635549999999,8.353069699999999";
      }
    ?>

   <script id="myScript">
    const options = [
      {location: [49.7699445, 8.347856], address: "Nossener Straße 10", gbl: "Simon Mahler, Stefan Landauer", con: "ALS",
      customers: "Henkell, LIDL, Co-Packing Alsheim", property: "", term: "", city: "Alsheim"},
      {location: [50.0499058, 9.0381559], address: "Industriegebiet Süd B 5", gbl: "Chris Steinbach", con: "AZN", customers: "LIDL", property: "", term: "", city: "Alzenau"},
      {location: [49.7436056, 8.1407801], address: "Karl Heinz Kipp Straße 1", gbl: "Chris Steinbach", con: "ALZ", customers: "LIDL, Thimm, Vranken", property: "", term: "", city: "Alzey"},
      {location: [49.75268, 8.14149], address: "Justus von Liebig Straße 33", gbl: "Chris Steinbach", con: "ALZ", customers: "Thimm, LIDL", property: "", term: "", city: "Alzey"},
      {location: [49.75245959999999, 8.1365916], address: "Robert Bosch Straße", gbl: "Chris Steinbach", con: "ALZ", customers: "LIDL", property: "", term: "", city: "Alzey"},
      {location: [49.69399809999999, 8.4520162], address: "Gewerbestraße 34", gbl: "Cetin Ritvan", con: "BIB", customers: "Penny Retouren, Intersnack", property: "", term: "", city: "Biblis"},
      {location: [49.7832835, 8.485920600000002], address: "Albert Einstein Straße 3", gbl: "Cetin Ritvan", con: "BIE", customers: "Penny Retouren", property: "", term: "", city: "Biebesheim"},
      {location: [49.5875966, 8.3491333], address: "Gutenbergstraße 29", gbl: "Jörg Schmidt", con: "BOB", customers: "Dalli", property: "", term: "", city: "Bobenheim"},
      {location: [51.6149407, 7.7950751], address: "Siemensstraße 33", gbl: "Julian Müller", con: "BOE", customers: "Henkel Klebstoff", property: "", term: "", city: "Bönen"},
      {location: [53.14243519999999, 8.701142599999999], address: "Carl Benz Straße 23", gbl: "Marco Oeltjebruns", con: "BRE",
      customers: "Lamotte, Finnern, IMTRON", property: "", term: "", city: "Bremen"},
      {location: [53.09784490000001, 8.7250982], address: "Senator Mester Straße 18", gbl: "Matthias Kuhnert", con: "BRE",
      customers: "Nanu Nana", property: "", term: "", city: "Bremen"},
      {location: [51.56430220000001, 7.516288899999999], address: "Gneisenauallee 20", gbl: "Michael Grothe", con: "DOR",
      customers: "Intersnack, Wenko, Felix, AVZ, Haribo", property: "", term: "", city: "Dortmund"},
      {location: [51.3946188, 6.722174], address: "Marseiller Straße 13", gbl: "Michael Grothe", con: "DUI", customers: "Allison, Wenko, BASF RODIM", property: "", term: "", city: "Duisburg"},
      {location: [51.3922877, 6.7220793], address: "Hamburger Straße 40", gbl: "DUI", con: "Michael Grothe", customers: "Johnson & Johnson", property: "", term: "", city: "Duisburg"},
      {location: [51.17535509999999, 6.838011299999999], address: "Henkelstraße 67", gbl: "Christoph Hoppenheit", con: "DUE", customers: "Henkel", property: "", term: "", city: "Duisburg"},
      {location: [49.7667586, 8.4938304], address: "Marie Curie Straße 19", gbl: "Marcel Narejkis", con: "GER", customers: "Fresenius", property: "", term: "", city: "Gernsheim"},
      {location: [49.7698064, 8.380587400000001], address: "An der L 437", gbl: "Stefan Landauer", con: "GIM", customers: "LIDL, Co-Packing", property: "", term: "", city: "Gimbsheim"},
      {location: [53.4815917, 9.9024396], address: "Heykenauweg 5", gbl: "Stefanie Engelke", con: "HKW", customers: "TST B2B, Beiersdorf", property: "", term: "", city: "Hamburg"},
      {location: [53.51192500000001, 9.9017804], address: "Dradenauer Deichweg 3", gbl: "Nils Hausschild", con: "DRA",
      customers: "Barry Callebaut, Unisped, Oceangate", property: "", term: "", city: "Hamburg"},
      {location: [53.5265995, 9.902914899999999], address: "Dradenau Straße 20", gbl: "Nils Hausschild", con: "DNS", customers: "B2B", property: "", term: "", city: "Hamburg"},
      {location: [53.5126351, 9.9615241], address: "Neuhöfer Brückenstraße 8", gbl: "Stefanie Engelke", con: "NHS", customers: "B2B", property: "", term: "", city: "Hamburg"},
      {location: [53.47037779999999, 9.980094399999997], address: "Konsul Ritter Straße 15-17", gbl: "Dirk Baumann", con: "LRS",
      customers: "ALDI, Henns & Mauritz, Daimler, MultiCom, Thimm", property: "", term: "", city: "Hamburg"},
      {location: [51.16052730000001, 6.9193893], address: "Weststraße 43", gbl: "Christoph Hoppenheit", con: "HIL", customers: "SC Johnson", property: "", term: "", city: "Hilden"},
      {location: [48.2355179, 10.0899799], address: "Robert Hansen Straße 2", gbl: "Ufuku Dal", con: "ILL", customers: "BASF", property: "", term: "", city: "Illertissen"},
      {location: [49.43815439999999, 8.515268299999999], address: "Rhenaniastraße 76-102", gbl: "Klaus Müller", con: "MAN", customers: "Unilever, Repacking Unilever",
      property: "", term: "", city: "Mannheim"},
      {location: [51.1012543, 6.8891334], address: "Rheinparkallee 5", gbl: "Uli Abele", con: "MON", customers: "Henkel", property: "", term: "", city: "Monheim"},
      {location: [51.0995409, 6.8913132], address: "Niederstraße 15", gbl: "Uli Abele", con: "MON", customers: "Henkel", property: "", term: "", city: "Monheim"},
      {location: [49.6325581, 8.211064], address: "Wasserturmstraße 1", gbl: "-", con: "MOS", customers: "Facility Management", property: "", term: "", city: "Monsheim"},
      {location: [50.0518686, 8.6604846], address: "An der Gehespitz 30", gbl: "Steffan Finster", con: "ISE", customers: "Rewe", property: "", term: "", city: "Neu Isenburg"},
      {location: [48.1413118, 16.3365494], address: "Richard Strauss Straße 31", gbl: "Martin Gelosky", con: "WIE", customers: "Henkel", property: "", term: "", city: "Wien"},
      {location: [48.1692112, 16.3192161], address: "Breitefurter Straße 57-59", gbl: "Martin Gelosky", con: "WIE", customers: "Henkel", property: "", term: "", city: "Wien"},
      {location: [52.217874, 13.235254], address: "Industriestraße 4", gbl: "Leonie Mittag", con: "TRE", customers: "Nanu Nana, Tchibo", property: "", term: "", city: "Trebin"},
      {location: [51.0939135, 6.6010884], address: "Grevenbroicher Straße 98", gbl: "Detlef Lehnen", con: "WEV", customers: "Intersnack", property: "", term: "", city: "Trebin"},
      {location: [49.69428, 8.3447481], address: "Mittelrheinstraße 31", gbl: "Perihan Kankal, Markus Landauer", con: "PUR",
      customers: "LIDL WEIN, BASF, Nestlé, Co-Packing", property: "", term: "", city: "Worms"},
      {location: [49.6923505, 8.345471], address: "Mittelrheinstraße 23", gbl: "Dirk Wiggert, Lukas Linse", con: "MAR", customers: "Internsack, Dalli, Co-Packing", property: "",
      term: "", city: "Worms"},
      {location: [49.68977, 8.345329999999999], address: "Mittelrheinstraße 19", gbl: "Simon Braun", con: "DPD", customers: "Transimpex", property: "", term: "", city: "Worms"},
      {location: [49.6868089, 8.3426444], address: "Hochrheinstraße 12", gbl: "Zafer Zengin, Markus Götte, Svantje Bernhardt, Peter Fischer", con: "HRS",
      customers: "ECC, Dalli, Dispo, Einkauf, Facility Management, Co-Packing, Grace", property: "", term: "", city: "Worms"},
      {location: [37.3543888, -77.3448111], address: "660 Hp Way", gbl: "-", con: "CHE", customers: "LIDL USA", property: "", term: "", city: "Chester"},
      {location: [49.6906277, 8.350544], address: "Oberrheinstraße 5", gbl: "Christoph Weyrauch", con: "WKS", customers: "Werkstatt", property: "", term: "", city: "Worms"},
      {location: [49.6772818, 8.346041], address: "Langgewann 2", gbl: "Niklas Künkele, Markus Landauer, Volker Steiner", con: "LWW", customers: "Nestlé, BASF, Dalli",
      property: "", term: "", city: "Worms"},
      {location: [49.6773208, 8.3469231], address: "Langgewann 3", gbl: "Markus Landauer", con: "BA2", customers: "BASF", property: "", term: "", city: "Worms"},
      {location: [49.665053, 8.3512145], address: "Am Guten Brunnen 7", gbl: "Markus Landauer", con: "AGB7", customers: "BASF", property: "", term: "", city: "Worms"},
      {location: [49.66635549999999, 8.353069699999999], address: "Am Guten Brunnen 1", gbl: "Oliver Jöhnk, Elex Friesen, Markus Landauer",
      con: "AGB1", customers: "BASF, ILS, BTC, Rewe Retouren", property: "", term: "", city: "Worms"},
      {location: [49.6669873, 8.3510593], address: "Am Guten Brunnen 10", gbl: "Christoph Beller", con: "AGB10", customers: "ILS, BASF", property: "", term: "", city: "Worms"},
      {location: [49.6471144, 8.3676886], address: "Petrus Dorn Straße 20", gbl: "Petra Baach, Christian Rother, Volker Steiner",
      con: "WTW", customers: "Danone, Roche, Dr. Beckmann, Nanu Nana, Lidl Wein, Co-Packing", property: "", term: "", city: "Worms"},
      {location: [49.8517401, 8.1193574], address: "Carl Benz Straße 4-8", gbl: "Mathias Schmidt", con: "THM", customers: "Thimm", property: "", term: "", city: "Wörrstadt"},
    ];

    const selectElement = document.getElementById('mySelect');
    for (let i = 0; i < options.length; i++) {
      const optionElement = document.createElement('option');
      optionElement.value = options[i].location;
      optionElement.text = options[i].address + " (" + options[i].city + " / " + options[i].con + ")";
      selectElement.appendChild(optionElement);
    }

    var phpecho = '<?php echo $cords; ?>';

    window.message = phpecho;

  </script>

  <div id="mapid" style="height: 1000px;"></div>
  <ul id="address-list"></ul>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>

  <script src="map.js"></script>

</body>
</html>
