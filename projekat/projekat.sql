-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2020 at 12:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `Id` int(11) NOT NULL,
  `Naziv` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`Id`, `Naziv`) VALUES
(1, 'Krivično pravo'),
(2, 'Porodično pravo'),
(3, 'Poslovno pravo');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `Id` int(11) NOT NULL,
  `Komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `VestId` int(11) NOT NULL,
  `KorisnikId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`Id`, `Komentar`, `VestId`, `KorisnikId`) VALUES
(1, 'Komentar 1', 1, 1),
(2, 'Komentar 2', 1, 1),
(3, 'Komentar 1', 3, 1),
(4, 'Komentar 2', 3, 1),
(5, 'Test komentar', 1, 1),
(6, 'Komentar proba', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`Id`, `Username`, `Password`, `Admin`) VALUES
(1, 'marko', '202cb962ac59075b964b07152d234b70', 0),
(2, 'mirko', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `Id` int(11) NOT NULL,
  `Naslov` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `KategorijaId` int(11) NOT NULL,
  `Img` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`Id`, `Naslov`, `Tekst`, `KategorijaId`, `Img`) VALUES
(1, 'Da li je \"Tajsonka\" učinila krivično delo? Evo šta kaže zakon', 'Pripadnica komunalne milicije Alisa M., koju je u nedelju na Vidikovcu nokautirala ulična prodavačica Sadija D, posle završene dijagnostike puštena je iz Urgentnog centra na kućno lečenje.\r\nS. D. je u nedelju odmah posle napada privedena u policijsku stanicu, saslušana i sledi sudski epilog.\r\nProtiv nje je podneta krivična prijava za napad na službeno lice. Kako list nezvanično saznaje, napadu na službenicu komunalne milicije prethodila je svađa dve prodavačice, kada je jedna od njih pozvala komunalnu miliciju.\r\n\r\nIncident se dogodio kada je milicionerka pokušala da prodavačici oduzme švercovanu robu i da je zadrži da ne pobegne dok ne dođe komunalna inspekcija. Ovu scenu, kao i trenutak kada prodavačica pesnicom udara u glavu milicionerku, koja pada na beton, snimio je telefonom jedan od prolaznika. Snimak je objavljen na društvenim mrežama i kasnije su ga preneli mediji. Javnost je o slučaju imala podeljeno mišljenje.\r\nNije sporno da je S. D. učinila krivično delo time što je udarila milicionerku. Ipak, da li su u pravu oni koji osporavaju ovlašćenja pripadnice komunalne milicije da prodavačicu drži i vuče za ruku? Sredstva prinude milicioner može da upotrebi samo ako u obavljanju poslova na drugi način od sebe ili drugog ne može da odbije istovremeni protivpravni napad, radi savladavanja otpora, odnosno sprečavanja pokušaja bekstva, navodi se u Zakonu o komunalnoj miliciji.\r\n\r\nOvo znači da je milicionerka po novom zakonu imala pravo da zadrži prodavačicu koja je pokušala da pobegne i odnese robu. Međutim, da li je upotrebila sredstva prinude na pravi način, utvrdiće sud. Sredstva prinude, kako precizira zakon, su fizička snaga, sredstva za vezivanje, raspršivač za nadražujućim dejstvom, palica.\r\nSkupština Srbije usvojila je u julu prošle odine Zakon o komunalnoj miliciji koji je omogućio da i opštine, a ne samo gradovi, mogu da planiraju njeno formiranje. U vezi sa uspostavljanjem komunalne milicije mnogi su bili skeptični i upozoravali su da to nije dobro rešenje, naročito kada je reč o ovlašćenjima.\r\n\r\nVažna izmena zakona je to da svi prekršioci moraju da postupe po nalogu komunalnog milicionera, što nije bio slučaj kod komunalne policije. Pripadnici milicije ne nose vatreno oružje, a zakon im je dao sledeća ovlašćenja: usmeno naređenje, proveru identiteta, dovođenje, zaustavljanje i pregled vozila, privremeno oduzimanje predmeta, audio i video prikupljanje obaveštenja.\r\nVršilac dužnosti sekretara za poslove komunalne milicije Ivan Divac osudio je napad i zahvalio kolegama koje su brzo intervenisale. Takođe, on je tražio najstrožu kaznu za napadačicu u skladu sa zakonom.', 1, ''),
(2, 'NOVO PRAVILO I bez venčanog lista pravo na PORODIČNU penziju', 'Pravo na porodičnu penziju od ove Nove godine imaju i vanbračni partneri, što znači da će posle smrti supružnika, iako se nisu potpisali pred matičarem, imati pravo da naslede primanje, ukoliko je njihova zajednica trajala najmanje tri godine. Isto važi i za one koji sa preminulim penzionerom imaju zajedničko dete, pišu Novosti. Po slovu Zakona, međutim, to pravo udovica može da ostvari samo ako je navršila 53 godine, ili u trenutku smrti supružnika ima najmanje 45 leta. U tom slučaju ček će početi da joj stiže tek kada napuni 53. Kada su u pitanju muškarci oni porodičnu penziju ne mogu da dobiju pre 58. godine. Ovo su samo neke od novina koje donose izmene Zakona o PIO koje su stupile na snagu 1. januara. U njima stoji i da će porodični penzioni ček stizati čak i na adresu razvedenog supružnika, ukoliko je sudskom presudom utvrđeno da ima pravo na izdržavanje. Za supružnike vojnih lica važe malo drugačija pravila. Vanbračni partner profesionalnog vojnika, koji je poginuo za vreme ratnih dejstava, pravo na porodičnu penziju stiče bez obzira na navršene godine, pod uslovom da nije ponovo sklopio brak. Iznos porodične penzije kod svih osiguranika određuje se od starosne, prevremene ili invalidske penzije koja bi osiguraniku pripadala u času smrti, u procentu koji se utvrđuje prema broju članova porodice koji imaju pravo na primanje. Tako ako je u pitanju jedan član dobiće 70 odsto, dva – 80, tri – 90 odsto, dok će četiri ili više članova dobiti čitav iznos. Od pre nekoliko dana drugačije je uređen i status osoba koje rade u našoj zemlji za stranog poslodavca koji nema registrovano predstavništvo. Doprinosi za zaposlene u takvim firmama će se plaćati po isteku roka utvrđenog zakonom, odnosno utvrđuje se vreme na koje se uplata doprinosa odnosi. To znači da se doprinosi dovode u odnos sa najnižom mesečnom osnovicom važećom u momentu njihove uplate. Ravnopravan položaj sa ostalim zaposlenima od početka ove godine imaju i oni koji su zaposleni na privremenim i povremenim poslovima ili rade preko omladinskih zadruga, po osnovu ugovora o delu, autorskog i drugih ugovora. Sve ove izmene trebalo bi da smanje administrativne postupke u matičnoj evidenciji, obaveze poslodavaca po tom osnovu, pojednostavljenje postupka, izbegavanje vođenja duplih evidencija preuzimanjem podataka od institucija koje raspolažu s njima, kao i posledično smanjenje administrativnih troškova.', 2, ''),
(3, 'Kakvo nas poslovno okruženje čeka u 2020', 'Najmanje milion građana i privrednika ove godine brže će proći kroz administrativne procedure zahvaljujući unapređenjima koja su napravljena tokom 2019. Ukoliko nas izbori u tome ne budu omeli, korak dalje može da bude napravljen i u 2020, ako budu sprovedene ideje koje Naled kandiduje na ekonomsku agendu.\n\nIako su godinu za nama obeležili i usponi i padovi kada je reč o poslovnom okruženju, posebno su se izdvojile četiri pozitivne reforme na kojima su radile resorne institucije u saradnji sa Naled-om. Izdvojile su se pre svega po tome što su građanima i privredi birokratski pojednostavile i učinile jeftinijim poslove s državnom i lokalnom administracijom.\n\n\nEFIKASNIJE PROCEDURE\n\nNajznačajnija reforma koja je usvojena u 2019, a praktično može da se \"isproba\" od 3. januara, odnosi se na drugu fazu sveobuhvatne reforme postupka upisa u katastar, odnosno ukidanje podnošenja poreskih prijava prilikom kupoprodaje nepokretnosti i ostavinskih postupaka. Od prvog radnog dana u januaru, građani više ne moraju da razmišljaju kako da popune prijave i gde da ih dostave jer će za njih to raditi javni beležnici i poreski organi. U praksi to znači i dva šaltera manje i niže troškove za 6,5 miliona evra u naredne četiri godine. Kako se u Srbiji godišnje obavi oko 120.000 kupoprodaja nepokretnosti i ostavinskih postupaka, nova efikasnija procedura \"pogodiće\" oko pola miliona ljudi. To je značajan rezultat postignut u partnerstvu sa Ministarstvom građevinarstva i Republičkim geodetskim zavodom kao vodećim institucijama u ovoj reformi, u okviru projekta \"Uvođenje jedinstvenog šaltera za registrovanje nekretnina u Srbiji\", koji uz podršku Fonda dobre uprave Vlade Ujedinjenog Kraljevstva sprovode Naled i PwC Srbija. Računajući i prvu fazu reforme katastra, kada su upis u katastar preuzeli javni beležnici, čime je drastično skraćeno vreme upisa, a broj šaltera sveden sa šest na jedan, ukupne uštede za period od četiri godine iznosiće oko 24 miliona evra.\n\nIzvršna direktorka Naled-a kaže da je veoma važna reforma i to što je za privredu konačno eliminisana obavezna upotreba pečata. Na insistiranje Naled-a, tokom 2018. godine, dva puta je menjan Zakon o privrednim društvima da bi pečat otišao u istoriju. \"Oko 400.000 preduzetnika i preduzeća može da posluje bez ovog relikta prošlosti. To je takođe jedno od dostignuća koje smo pomogli da se desi uz podršku Fonda za dobru upravu Vlade Ujedinjenog Kraljevstva i saradnju s Ministarstvom privrede i Kabinetom premijerke\", kaže Violeta Jovanović, izvršna direktorka Naled-a.\nVažne novine koje su obeležile 2019. jesu i automatizacija sistema paušalnog oporezivanja i kreiranje indikativnog kalkulatora (www.jpd.rs) za izračunavanje poreskih obaveza, koji je za nešto više od mesec dana korišćen čak 49.000 puta. Poreska rešenja za oko 117.000 preduzetnika paušalaca od 2020. neće više kasniti po nekoliko meseci, već će stizati na početku poslovne godine i to elektronski, a poreska obaveza biće obračunata na osnovu preciznih kriterijuma.\n\nZnačajan efekat postignut je i kada je reč o sezonskim radnicima u poljoprivredi, jer zbog olakšane prijave putem portala ili mobilne aplikacije i smanjivanja poreske obaveze za prijavljivanje sve više ulaze u legalne tokove. Prijava sezonaca \"na klik\" je neslavan prosek od 3500 sezonaca godišnje već u prvoj godini primene podigla na 27.000 prijavljenih. Kroz njihove poreze i doprinose u budžet se slilo 250 miliona dinara.\n\nKad se podvuče crta, 2019. godinu će svakako obeležiti i bolja zaštita manjinskih akcionara kroz izmene Zakona o privrednim društvima i veća prava poverilaca kroz izmene Zakona o stečaju. Ove dve izmene su u najvećoj meri doprinele skoku Srbije na Duing biznis listi sa 48. na 44. mesto, na čemu je Naled radio zajedno s Vladom Srbije u okviru Zajedničke grupe za unapređenje pozicije na Duing biznis listi Svetske banke, koja po kriterijumu lakoća poslovanja rangira 190 zemalja sveta. Takođe, izrađeni su novi Akcioni plan za suzbijanje sive ekonomije i Strategija razvoja eUprave, kompletiran je sistem eInspektor i umreženo 36 republičkih inspekcija, koje će moći efikasnije da otkrivaju sivu ekonomiju.\n\nJovanović kaže da je agenda Naled-a za 2020, iza koje stoji 320 članova iz redova kompanija, lokalnih samouprava i organizacija civilnog društva, još ambicioznija: \"Naled je pripremio plan koji će zagovarati, kako bismo građane i privredu rasteretili suvišne birokratije, a javnu upravu učinili efikasnim servisom za sve nas\".\n\nPrva velika oblast koja će u 2020. biti u fokusu je, kako je rekla, rešavanje pitanja imovine.\n\"Postignut je veliki uspeh kada je reč o sistemu izdavanja građevinskih dozvola i elektronskog upisa u katastar. Uvođenje eDozvole prepoznala je i Svetska banka, pa smo po ovom kriterijumu na Duing biznis listi napredovali sa 186. na 9. poziciju u svetu. Prvu fazu reforme katastra, koja se odnosi na uvođenje eŠaltera, osetio je svako ko je po tom, modernom sistemu upisivao vlasništvo u evidenciju Republičkog geodetskog zavoda. Sada idemo dalje, a to podrazumeva da što pre pređemo na sledeći nivo i krenemo u modernizaciju izrade planskih dokumenata. Novi, moderan sistem eProstor omogućio bi da se dugotrajna i iscrpljujuća procedura, koja podrazumeva stalnu papirnu prepisku institucija, javnih preduzeća i drugih imalaca javnih ovlašćenja, drastično skrati. To bi se postiglo tako što bi svi radili istovremeno, svako u svom delu nadležnosti, na e-prostornom planu, putem jedinstvenog softvera\", objasnila je Jovanović.\n\nNabrajajući šta je sve potrebno uraditi kako bi se unapredilo rešavanje pitanja imovine, ona navodi i da je takođe potrebno da konačno i procedura konverzije prava korišćenja u pravo svojine pretrpi promene, kako ne bi dalje kočila gradnju, kao i da se otvori tema tzv. obnove katastra nepokretnosti da bi se u narednih tri do pet godina rešili sporni odnosi na parcelama koji su takođe jedna od velikih kočnica efikasnom korišćenju zemljišta.\n\n\nSMANJIVANJE BIROKRATIJE\n\nPrema njenim rečima, sledeća važna tema za 2020. jeste da se temeljno urede radni odnosi, a Naled godinama zagovara osetnije poresko rasterećenje zarada koje je za 79 odsto privrednika glavni uzrok sive ekonomije i najveće opterećenje poslovanja koje negativno utiče na promet, mogućnosti za investiranje i zapošljavanje.\n\n\"Predložićemo reformu sistema doprinosa i pokrenuti dijalog u cilju ispunjenja ove ambiciozne želje. Veliki deo radne snage je u sivoj zoni i zato je nužno da se fleksibilni oblici rada (projektni angažman, rad sa nepunim radnim vremenom itd.) regulišu i učine poreski atraktivnijim. Danas je angažovanje nekoga na četiri sata preskupo zbog poreskih propisa i ti ljudi najčešće rade neprijavljeni, a za njima postoji tražnja, i mnogi su zainteresovani da na taj način ostvare dodatne prihode uz puno poštovanje njihovih prava\", dodaje Jovanović.\nIzradom softvera Naled je omogućio registraciju sezonskih radnika u poljoprivredi \"na klik\", uz 40 odsto niže troškove poreza i doprinosa. Pomenuti skok prijavljivanja sezonaca predstavlja evidentan uspeh nove procedure i potvrđuje stav Naled-a da bi trebalo proširiti prijavu putem portala i mobilne aplikacije i na druge oblasti, kao što su, primera radi, kućni poslovi, građevinarstvo i turizam.\n\n\"Smanjenja birokratije nema bez daljeg razvoja eUprave i to je treća oblast u vrhu naše agende za 2020. Već duže vreme Naled zagovara uvođenje eAgrara kako bi se omogućila elektronska registracija poljoprivrednih gazdinstava i na taj način višestruko smanjili administrativni troškovi. Procene su da bi troškovi sa 133 miliona dinara pali na 19 miliona, dok bi potrebno vreme za proceduru bilo skraćeno sa 280 na 75 minuta. Sledeća velika inovacija bilo bi eSanduče i sistem za elektronsku dostavu dokumenata, što bi značajno unapredilo pravnu sigurnost i rešilo brojne probleme, a posebno one u sudskim sporovima i situacijama kada dužnik ne dobije na vreme informaciju o dugu\", naglašava Jovanović.\n\nČetvrta velika tema je, kao i prethodnih godina, suzbijanje sive ekonomije. Nakon izrade softvera za automatsko i transparentno obračunavanje paušalnog poreza, vreme je i da se, za 117.000 paušalaca, omogući objedinjena uplata obaveza, na jedan umesto na četiri računa.\n\nS obzirom na to da samo 40 odsto privrede ima obavezu posedovanja fiskalne kase, proširenje obuhvata fiskalizacije stvorilo bi bolje uslove za fer-plej utakmicu na tržištu. Uz to, ovo je godina u kojoj bi trebalo da se konačno prelomi da li želimo uvođenje reda u sistem neporeskih nameta. Ostaje predlog Naled-a da se formira javni elektronski registar za sve takse, koji bi onemogućio da institucije ili javna preduzeća naplaćuju namete koji nisu prijavljeni u tu evidenciju. Za registar se već kandiduje više od 1100 taksi i naknada. I da bi se građanima i privredi olakšalo prijavljivanje sive ekonomije, plan za 2020. je da se formira Jedinstveni kontakt centar, koji bi predloge distribuirao na prave adrese.\n\n\"Znamo da su ključni preduslovi za ispunjenje ovakvog plana svakako kvalitetan javno-privatni dijalog i saradnja koja podrazumeva da institucije ne rade same već da konsultuju privredu i građane oko trasiranja reformi. Mnoge od sprovedenih reformi su rezultat upravo toga. Istraživanja govore da poverenje raste – čak 83 odsto ispitanika u javnom sektoru prepoznaje da je dijalog ključan za uspešnu primenu propisa, dok dva od tri privrednika kažu da u 2020. žele da budu aktivnije uključeni u izmene regulative\", zaključila je Jovanović.\nKada bi se planovi za 2020. sumirali u jednoj rečenici, to bi izgledalo ovako: U 2020. se može očekivati da će u fokusu Naled-a biti rešavanje imovinsko-pravnih odnosa na zemljištu kroz dalju reformu katastra, unapređenje radnih odnosa smanjenjem poreskog opterećenja rada i uvođenjem novih fleksibilnih oblika rada, razvoj sistema eAgrar, kao i dalje suzbijanje sive ekonomije sa posebnim fokusom na merama kao što su pokretanje jedinstvenog Kontakt centra za prijavljivanje rada mimo propisa, proširenje obuhvata fiskalizacije i razvoj javnog registra neporeskih nameta.', 3, ''),
(4, 'Pravo na eutanaziju biće propisano posebnim zakonom', 'Mogućnost legalizovanja prava na dostojanstvenu smrt podelilo je i stručnjake i javnost. – Eutanazija u najvećem broju zemalja ne samo da nije dozvoljena već je propisana kao posebno krivično delo\n\nPrednacrt budućeg građanskog zakonika Srbije već je završen, ali je neizvesna njegova dalja sudbina. Naime, Vlada Srbije donela je još u julu prošle godine odluku o prestanku rada komisije za izradu GZ, a još nema odgovora na pitanje da li će uskoro biti utvrđen predlog budućeg zakonika koji bi bio prosleđen Narodnoj skupštini na glasanje.\n\nU Ministarstvu pravde rečeno nam je da oni nisu nadležni za buduću sudbinu prednacrta GZ, ali da su 2015. godine na svom sajtu objavili tekst koji je bio dostupan za javnu raspravu. Kada je reč o vladi, izvesno je da ona neće pre izbora odlučivati o ovom važnom zakonskom projektu.\n\nPodsetimo, prednacrt GZ objedinjuje opšti deo građanskog prava, obligacione odnose, stvarno pravo, porodične odnose i nasledno pravo. I dok su stručnjaci naglašavali da je njegova najveća vrednost u usavršavanju načela građanskog prava i sve brojnijih modernih ugovora u poslovnom svetu, dotle je javnost bila najviše zainteresovana za pitanja iz oblasti porodičnih odnosa – odnos roditelja i dece, mogućnost izjednačavanja imovinskih prava partnera iz istopolnih vanbračnih zajednica, surogat materinstvo i eutanaziju.\n\nSada se, kako saznajemo, razmatra mogućnost da ova sporna pitanja budu rešena posebnim zakonima.\n\nNa „Kopaoničkoj školi prirodnog prava – Slobodan Perović”, održanoj pre nepunih mesec dana, ovoga puta to nisu bile istaknute teme, ali je škola na indirektan način poslala poruku time što je drugu nagradu „Profesor Slobodan Perović” dodelila studentu Davidu Vučiniću sa Pravnog fakulteta u Beogradu, koji se jasno u svom stručnom radu opredelio protiv legalizacije eutanazije u Srbiji. Nagrađeni student je naglasio da predlozima za aktivnu direktnu eutanaziju treba reći „ne”.\n\nTakva eutanazija u najvećem broju zemalja ne samo da nije dozvoljena već je propisana kao posebno krivično delo. U našem Krivičnom zakoniku inkriminisana je kao „lišenje života iz samilosti”, sa zaprećenom kaznom zatvora od šest meseci do pet godina.\n\n„Niko nema prava da drugu osobu liši života, ma kako loš taj život bio”, naveo je Vučinić.\n\nPoznato je da je i profesor dr Slobodan Perović, koji je bio na čelu komisije za izradu prednacrta GZ, zastupao stav da eutanaziju ne treba legalizovati, zbog mogućnosti da „pravo na dostojanstvenu smrt” bude zloupotrebljeno.\n\nPosle smrti profesora Perovića, u februaru prošle godine, komisija je nastavila rad, na čelu sa profesorom dr Miodragom Orlićem, koji je javnosti obrazložio da zakonodavac treba da razmotri mogućnost uvođenja ovog prava, pod strogo propisanim uslovima. Isto tako, ponovo je aktuelizovano i pitanje uvođenja pravila o „rađanju za drugoga” – surogat materinstva. Nekoliko meseci kasnije, međutim, vlada je donela odluku o prestanku rada komisije.\n\nPredsednica Kopaoničke škole profesor dr Jelena S. Perović Vujačić naglasila je u decembru, na svečanom otvaranju susreta pravnika, da prednacrt GZ ostaje zabeležen i dokumentovan i time dostupan javnosti.\n\n„Za vreme profesora Slobodana Perovića izrađen je prednacrt građanskog zakonika Republike Srbije, koji je publikovan i dostavljen na javnu raspravu. Objavljivanjem ovog dela omogućeno je da se povuče jasna granica između prednacrta GZ koji je izrađen za vreme profesora Slobodana Perovića i svega onoga što će uslediti posle njegovog odlaska. Kada je reč o daljoj sudbini prednacrta, upućujem reči profesora Perovića: Velike kodifikacije na prestaju da žive – rekla je prof. dr Jelena S. Perović Vujačić.\n\nPodsetila je da je Kopaonička škola rodno mesto prednacrta GZ, jer su prvi bitni koraci u pravcu izrade ovog velikog zakonskog projekta učinjeni upravo u okviru rada na katedrama ove škole. Na poslednjim susretima na Kopaoniku bilo je najviše reči o obligacionom pravu, ali nije bilo zaključaka koje se odnose na najosetljivija pitanja iz oblasti porodičnog prava.\n\n', 1, ''),
(6, '', '', 0, ''),
(7, 'Izmenama Porodičnog zakona ukidaju se dečiji brakovi u Srbiji', 'Najnovijim izmenama i dopunama Porodičnog zakona ukidaju se dečiji brakovi i Srbiji, a za roditelje koji dogovaraju i ugovaraju te brakove biće predviđene krivične sankcije, javlja agencija Beta, pozivajući se na dnevni list Politika.\r\n\r\nKrivične sankcije biće predviđene i za punoletne osobe ukoliko počnu zajednički život sa maloletnikom, rekao je za Politiku posebni savetnik ministra za rad Dragan Vulević.\r\n\r\n\"Svesni smo da izmene zakona neće sprečiti ovu pojavu, ali moram da naglasim da će biti predviđene krivične sankcije za roditelje koji dozvoljavaju ili ugovaraju ovakve brakove, ali i za punoletne osobe ukoliko počnu zajednički život sa maloletnikom\", rekao je Vulević.\r\n\r\nNaveo je da se u Srbiji svake godine sklopi oko 2.000 brakova, a da je postojeći zakon mnogim roditeljima \"nudio alibi za prodaju dece\", te je, kako je rekao, \"odlučeno da se toj pojavi stane na put\".\r\n\r\n\"Po slovu postojećeg zakona, dete strarije od 16 godina može stupiti u brak na osnovu odluke suda u vanparničnom postupku, uz dostavljeno mišljenje centra za socijalni rad o dostignutoj psiho-fizičkoj spremnosti. Izmenama zakona se ta mogućnost ukida i brak će ubuduće moći da sklope samo punoletne osobe\", navodi Vulević.', 2, 'img/iteh1.jpg'),
(8, '\"U Srbiji postoje tri vrste prostitucije\" Advokat za Pink otkriva KO JE PRVI NA UDARU ZAKONA, KAO I ZA KOGA SU KAZNE NAJSTOŽE! ', 'Pajović ističe da postoji krivični zakon koji reguliše pitanje posredovanja u vršenju usluge prostitucije.\r\n\r\n“Krivični zakon definiše proganjanje organizacije prostitucije, i tu omamo dva krivična dela, jedno je posredovanje u vršenju prostitucije, i drugo je trgovina ljudima, i to na bilo koji način. Bilo koji način na koji se dolazi na prodaju ljudi radi prostitucije, takođe je veoma teško krivično delo”, rekao je Pajović.\r\nKako kaže, u “Zvončici” se radi o organizovanoj prostituciji i potpada pod krivični zakon.\r\n\r\n“To je najstariji zanat na svetu i nikada se neće istrebiti. Uvek će postojati. Postavlja se krucijalno pitanje, da li treba regulisati sa sankcijama ili se treba legalizovati”, rekao je Pajović.\r\nMarko Lopušin, novinar i pisac, ističe da u Srbiji postoje tri vrste prostitucije, ulična, kućevna i elitna.\r\n\r\n“Elitna je dobro organizovana i obavlja se uglavnom u tajnim, skrovitim i dobro odabranim mestima. U ekskluzivnim hotelima, motelima i jahtama. Lično ne verujem da ugledni političari i ugledne javne ličnosti koriste servis elitne prostitucije, jer ako je čovek ugledan i ako ima moć, verovatno da može da bira damu ili momka”, rekao je Lopušin.\r\n\r\nMeđutim, on ističe da istraživanja pokazuju da naši organi uglavnom progone uličnu prostituciju, gde kako kaže, godišnje bude uhapšeno oko stotinu dama, kao i 10-ak muškaraca.\r\nStevan Đokić, predsednik Centra za bezbednost, istrage i DBA, rekao je da neke službe imaju u svojim redovima doušnike, i “radnice” koje kako bi slobodnije radile, prikupljaju i donose podatke o klijentima.\r\n\r\n“Kada je prostitucija u pitanju, radi se o prekršaju. To je zakon o uznemiravanju reda i mira, dobijaju do 30 dana zatvora, eventualno novčana kazna. Ono što je specifično kod nas, dugo nije postojala kazna za korisnike usluga, 2016. je i to ušlo u zakon”, rekao je Đokić, dodajući da u Norveškoj na primer, kažnjavaju isključivo korisnika usluge, a ne davalac.\r\nLopušin ističe da nikada niko nije odgovarao od velikih klijenata, i dodaje da se uglavnom sve svali na “uličare”.\r\n\r\n“Mi smo tokom devedesetih godina došli do otkrića prvog ozbiljnog organizovanja prostitucije preko raznih naših krugova. U to vreme su se dešavale masovne otmice mladih žena iz raznih zemalja”, rekao je Lopušin.\r\n\r\nKako kaže, ulične dame naplaćuju do 4000 dinara svoje usluge, a takozvana pratnja do 4000 evra, tako da, dodaje, policija uglavnom goni ono što je krivično delo, ali i dodaje da je to teško dokazivo.', 1, 'img/iteh2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
