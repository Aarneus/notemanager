<?php
include dirname(__FILE__) . DS. "index.php";

?>

<h1>Selectors</h1>
<pre>
http://www.w3.org/TR/selectors/
</pre>

<script>
jQuery(document).ready(function() {

	// html elements of type
	console.log( jQuery("h3") );
	// element by its id
	console.log( jQuery("#content") );
	
	// elements based on class
	console.log( jQuery(".loremlink") );
	
	// All the radio buttons
	console.log( jQuery("input[type=radio]") );
		
	// the current document
	console.log( jQuery(document) );

	// some native html element, create jQuery node from it
	console.log( jQuery( document.getElementById('content') ) );


	// manipulate all the lipsum links, make them green
	jQuery('.loremlink').css('color', 'green');
	// and just for demo, when hitting H1 element, make them blue
	jQuery("H1").click(function(ev) {
		jQuery('.loremlink').css('color', 'blue');
	});
	// when user select one radiobutton, remove the other loremlipsum from page
	jQuery("input[type=radio]").change(function(ev) {
		// $(this) is the element than triggered this event, in this case radio button
		var _node = $(this);
		if (_node.parent().attr('id') == 'seitseman') {
			jQuery("#kalevala").remove();
		} else if (_node.parent().attr('id') == 'kalevala') {
			jQuery("#seitseman").remove();
		}
	});

	// highlight from effects. copy highlights what get copied
	
	
	
	
});
</script>


<h2>Lorem lipsumia suomeksi</h2>
<p><a href="http://www.loremipsum.fi/">www.loremipsum.fi/</a></p>
<div id="content">
	<div id="kalevala">
		<h3>Kalevala</h3>
		<input type="radio" value="kalevala" name="loremipsum" />
		<p><a class='loremlink' href="http://www.loremipsum.fi/www.loremipsum.fi/kalevala/">loremipsum.fi/kalevala/</a></p>
		
		<p>
		Mieleni minun tekevi, aivoni ajattelevi lähteäni laulamahan, saa'ani sanelemahan, sukuvirttä suoltamahan, lajivirttä laulamahan. Sanat suussani sulavat, puhe'et putoelevat, kielelleni kerkiävät, hampahilleni hajoovat.
		</p>
		<p>
		Veli kulta, veikkoseni, kaunis kasvinkumppalini! Lähe nyt kanssa laulamahan, saa kera sanelemahan yhtehen yhyttyämme, kahta'alta käytyämme! Harvoin yhtehen yhymme, saamme toinen toisihimme näillä raukoilla rajoilla, poloisilla Pohjan mailla.
		</p>
		<p>
		Lyökämme käsi kätehen, sormet sormien lomahan, lauloaksemme hyviä, parahia pannaksemme, kuulla noien kultaisien, tietä mielitehtoisien, nuorisossa nousevassa, kansassa kasuavassa: noita saamia sanoja, virsiä virittämiä vyöltä vanhan Väinämöisen, alta ahjon Ilmarisen, päästä kalvan Kaukomielen, Joukahaisen jousen tiestä, Pohjan peltojen periltä, Kalevalan kankahilta.
		</p>
		<p>
		Niit' ennen isoni lauloi kirvesvartta vuollessansa; niitä äitini opetti väätessänsä värttinätä, minun lasna lattialla eessä polven pyöriessä, maitopartana pahaisna, piimäsuuna pikkaraisna. Sampo ei puuttunut sanoja eikä Louhi luottehia: vanheni sanoihin sampo, katoi Louhi luottehisin, virsihin Vipunen kuoli, Lemminkäinen leikkilöihin.
		</p>
		<p>
		Viel' on muitaki sanoja, ongelmoita oppimia: tieohesta tempomia, kanervoista katkomia, risukoista riipomia, vesoista vetelemiä, päästä heinän hieromia, raitiolta ratkomia, paimenessa käyessäni, lasna karjanlaitumilla, metisillä mättähillä, kultaisilla kunnahilla, mustan Muurikin jälessä, Kimmon kirjavan keralla.
		</p>
		<p>
		Vilu mulle virttä virkkoi, sae saatteli runoja. Virttä toista tuulet toivat, meren aaltoset ajoivat. Linnut liitteli sanoja, puien latvat lausehia.
		</p>
	</div>
	<div id="seitseman">
	
		<h3>7 Veljestä</h3>
		<input type="radio" value="seitsemanveljesta" name="loremipsum" />
		<p><a class='loremlink' href="http://www.loremipsum.fi/www.loremipsum.fi/seitseman_veljesta/">loremipsum.fi/seitseman_veljesta/</a></p>
		<p>
		Jukolan talo, eteläisessä Hämeessä, seisoo erään mäen pohjoisella rinteellä, liki Toukolan kylää. Sen läheisin ym­päristö on kivinen tanner, mutta alempana alkaa pellot, joissa, ennenkuin talo oli häviöön mennyt, aaltoili teräinen vilja. Peltojen alla on niittu, apilaäyräinen, halkileikkaama monipolvisen ojan; ja runsaasti antoi se heiniä, ennenkuin joutui laitumeksi kylän karjalle. Muutoin on talolla avaria metsiä, soita ja erämaita, jotka, tämän tilustan ensimmäisen perustajan oivallisen toiminnan kautta, olivat langenneet sille osaksi jo ison jaon käydessä entisinä aikoina. Silloinpa Jukolan isäntä, pitäen enemmän huolta jälkeentulevainsa edusta kuin omasta parhaastansa, otti vastaan osaksensa kulon polttaman metsän ja sai sillä keinolla seitsemän vertaa enemmän kuin toiset naapurinsa. Mutta kaikki kulovalkean jäljet olivat jo kadonneet hänen piiristänsä ja tuuhea metsä kasvanut sijaan. - Ja tämä on niiden seitsemän veljen koto, joiden elämänvaiheita tässä nyt käyn kertoilemaan.
		</p>
		<p>
		Veljesten nimet vanhimmasta nuorimpaan ovat: Juhani, Tuomas, Aapo, Simeoni, Timo, Lauri ja Eero. Ovat heistä Tuomas ja Aapo kaksoispari ja samoin Timo ja Lauri. Juhanin, vanhimman veljen, ikä on kaksikymmentä ja viisi vuotta, mutta Eero, nuorin heistä, on tuskin nähnyt kahdeksantoista auringon kierrosta. Ruumiin vartalo heillä on tukeva ja harteva, pituus kohtalainen, paitsi Eeron, joka vielä on kovin lyhyt. Pisin heistä kaikista on Aapo, ehkä ei suinkaan hartevin. Tämä jälkimmäinen etu ja kunnia on Tuomaan, joka oikein on kuuluisa hartioittensa levyyden tähden. Omituisuus, joka heitä kaikkia yhteisesti merkitsee, on heidän ruskea ihonsa ja kankea, hampunkarvainen tukkansa, jonka karheus etenkin Juhanilla on silmään pistävä.
		</p>
		<p>
		Heidän isäänsä, joka oli ankaran innokas metsämies, kohtasi hänen parhaassa iässään äkisti surma, kun hän tappeli äkeän karhun kanssa. Molemmat silloin, niin metsän kontio kuin mies, löyttiin kuolleina, toinen toisensa rinnalla maaten verisellä tanterella. Pahoin oli mies haavoitettu, mutta pedonkin sekä kurkku että kylki nähtiin puukon viiltämänä ja hänen rintansa kiväärin tuiman luodin lävistämänä. Niin lopetti päivänsä roteva mies, joka oli kaatanut enemmän kuin viisikymmentä karhua. ­ Mutta näiden metsäretkiensä kautta löi hän laimin työn ja toimen talossansa, joka vähitellen, ilman esimiehen johtoa, joutui rappiolle. Eivät kyenneet hänen poikansakaan kyntöön ja kylvöön; sillä olivatpa he perineet isältänsä saman voimallisen innon metsäotusten pyyntöön. He rakentelivat satimia, loukkuja, ansaita ja teerentarhoja surmaksi linnuille ja jäniksille. Niin viettivät he poikuutensa ajat, kunnes rupesivat käsittelemään tuliluikkua ja rohkenivat lähestyä otsoa korvessa.
		</p>
	</div>			
</div>