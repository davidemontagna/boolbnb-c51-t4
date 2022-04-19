<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Apartment;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $apartments = [
            [
                "title" => "Vic Pigneto",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "65",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/196415977.jpg?k=0f2a4120fff1af7ec6899339e052cf74e22b88af11d3dac143bbdb8e8da0a9aa&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Roma, il Vic Pigneto si trova a 2,9 km da Porta Maggiore e a 4,1 km dall'Università di Roma La Sapienza, e offre la connessione WiFi gratuita, l’aria condizionata e un salotto in comune. La struttura dista 5 km dalla Basilica di Santa Maria Maggiore ed è provvista di un deposito bagagli.
        
                          L’appartamento dispone di 1 camera da letto, 4 bagni, lenzuola, asciugamani, TV a schermo piatto, zona pranzo, cucina completamente attrezzata e patio con vista sul giardino.
        
                          Presso la struttura avrete a disposizione un servizio di autonoleggio.
        
                          Il Vic Pigneto è ubicato a 16 km dall’Aeroporto di Roma Ciampino, lo scalo più vicino, e fornisce un servizio di navetta aeroportuale a un costo aggiuntivo.",
            ],
            [
                "title" => "Vatican Palace Suites by Premium Suites Collection",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "27",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/230619546.jpg?k=c2b8dbc3e51be769bcc9f47f3e62387e3d4591d336ef6fa0e4905d0fb3464ec6&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Roma, a 1 km da Piazza San Pietro, il Vatican Palace Suites by Premium Suites Collection offre la connessione WiFi gratuita, il check-in e il check-out express e il servizio concierge. La struttura si trova a circa 1,2 km dalla Basilica di San Pietro, a 1,8 km dai Musei Vaticani e a 2,2 km da Castel Sant’Angelo. Potrete soggiornare in camere familiari.
        
                          Tutte le sistemazioni presentano interni climatizzati, una TV a schermo piatto con canali satellitari, un frigorifero, un bollitore elettrico, un bidet, un asciugacapelli e una scrivania. Le sistemazioni sono dotate di lenzuola e bagno privato con set di cortesia.
        
                          La struttura dista 2,3 km dal Vaticano e da Piazza del Popolo. L’Aeroporto di Roma-Ciampino, lo scalo più vicino, sorge a 19 km dal Vatican Palace Suites by Premium ed è raggiungibile con un apposito servizio navetta a pagamento.",
            ],
            [
                "title" => "Happy Holiday in Rome b&b",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "27",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/58854889.jpg?k=9d756b99302d63fc861511774cb5ee33dcb4bb464abfb718bc3060728963d737&o=&hp=1",
                "visible" => "",
                "description" => "Situata a Roma, l'Happy Holiday in Rome b&b sorge a 1,6 km dai Musei Vaticani.
        
                          L'Happy Holiday in Roma propone la connessione WiFi gratuita nell'intero edificio e camere dotate di TV a schermo piatto con canali satellitari e bagno privato con bidè, doccia e asciugacapelli.
        
                          Presso la struttura potrete ottenere utili informazioni turistiche e approfittare di un computer e un salone in comune.
        
                          L'Happy Holiday in Rome b&b dista 1,9 km dalla Basilica di San Pietro, 2 km dal Vaticano e 27 km dall'Aeroporto Internazionale di Roma-Fiumicino.",
            ],
            [
                "title" => "B&B Sepulveda",
                "num_rooms" => "1",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "15",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/338117172.jpg?k=b1d1f04b562a9157dd9179a7f268f44f4e762af785bf1a7eedfcd3430d52b27b&o=&hp=1",
                "visible" => "",
                "description" => "Il B&B Sepulveda dista 5 minuti a piedi dalla stazione della metropolitana Re di Roma. Offre camere con connessione Wi-Fi gratuita.
        
                          Arredate in stile classico, le sistemazioni del Sepulveda dispongono di pavimenti in parquet e bagno privato o in comune.
        
                          Nell'area comune troverete un frigorifero, un bollitore e un forno a microonde.
        
                          La stazione della metropolitana San Giovanni dista 500 m. Tutte le famose attrazioni di Roma, come Piazza di Spagna o il Colosseo, sono facilmente raggiungibili in metropolitana.",
            ],
            [
                "title" => "Soggiorno Emanuela",
                "num_rooms" => "1",
                "num_bed" => "4",
                "num_bath" => "1",
                "square_footage" => "15",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/263933337.jpg?k=576c7fbb8d177afcb4697f2dbab56b1492e7cc610ebe32997b84fe303aad924f&o=&hp=1",
                "visible" => "",
                "description" => "Situato in una posizione incantevole nel quartiere della Stazione Centrale di Roma, il Soggiorno Emanuela si trova a 1,5 km da Santa Maria Maggiore, a 1,6 km dall’Università La Sapienza e a 1,8 km da Piazza Barberini. Tra i servizi gratuiti figurano un programma di intrattenimento e una cucina in comune.
        
                          Le sistemazioni di questo ostello sono dotate di bollitore. Comprendono bagno comune con doccia e asciugacapelli e vantano il WiFi gratuito. Avrete a disposizione un forno a microonde.
        
                          Il Quirinale dista 1,8 km dalla struttura. L’Aeroporto di Roma-Ciampino, lo scalo più vicino, è ubicato a 16 km dal Soggiorno Emanuela.",
            ],
            [
                "title" => "Roma Carina",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "18",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/92917824.jpg?k=be025772d70b5ccd232991d625bb96ae7c0f8a1929e09e8e7ea0c39a61f82e40&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Roma, a 600 metri da Porta Maggiore, il Roma Carina offre camere climatizzate con connessione WiFi gratuita. Questo affittacamere dista 1,1 km dall’Università La Sapienza e 900 metri dalla Domus Aurea e da Santa Maria Maggiore. La struttura sorge nel quartiere della Stazione Centrale.
        
                          Tutte le sistemazioni dispongono di TV e scrivania.
        
                          Il Roma Carina si trova a 12 km dall'Aeroporto di Roma - Ciampino.",
            ],
            [
                "title" => "My Tiny Home Fastime",
                "num_rooms" => "2",
                "num_bed" => "4",
                "num_bath" => "1",
                "square_footage" => "30",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/113771342.jpg?k=1d95af6847702ba09591ceb19e6e8bbc733d57a0cf5e5a6411e73b77741a53b8&o=&hp=1",
                "visible" => "",
                "description" => "Situata a Roma, a 60 m dai Musei Vaticani, la My Tiny Home offre la vista sulla città. Tra i servizi di questa struttura figurano una cucina e un salone in comune, e la connessione WiFi gratuita in tutte le aree. La struttura dispone di camere familiari.
        
                          Tutte le camere sono dotate di aria condizionata, forno a microonde, frigorifero, bollitore, bidet, asciugacapelli, scrivania. Le camere sono dotate di armadio, TV a schermo piatto e bagno privato.
        
                          Il My Tiny Home serve ogni mattina una colazione all'italiana.
        
                          La struttura dista 1,6 km da Piazza San Pietro e 2 km dal Vaticano. Il My Tiny Home dista 28 km dall'aeroporto più vicino, quello di Fiumicino, raggiungibile con un servizio di navetta aeroportuale a pagamento.",
            ],
            [
                "title" => "VATICAN LUXURY SUITE",
                "num_rooms" => "2",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "30",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/263393015.jpg?k=41055d5682c827c827b1bf9fdbd7cc5086b6ca65f037da158b7cbc59cde4563c&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Roma, a 400 metri dai Musei Vaticani, il Vatican Luxury Suites è interamente coperto dal WiFi gratuito.
        
                          Provviste di TV a schermo piatto e bollitore, le camere sono sempre dotate di un bagno privato con vasca o doccia, bidet, set di cortesia e asciugacapelli, mentre solo in alcuni casi dispongono di un'area salotto.
        
                          In loco potrete inoltre usufruire di una cucina in comune.
        
                          Ubicato a 800 metri dalla Basilica di San Pietro e dal Vaticano, il Vatican Luxury Suites dista 17 km dall'Aeroporto di Roma Ciampino.",
            ],
            [
                "title" => "NearHome Smart Suites Guest House",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "25",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/261462354.jpg?k=13f8c7461a7beb3a91049b8f18da50e7e77ce712abece3cc1bb68bc5e461fca4&o=&hp=1",
                "visible" => "",
                "description" => "Il NearHome si trova a Roma, a soli 350 metri dalla famosa via Veneto e a 800 metri dalla stazione della metropolitana Barberini, con collegamenti diretti per i musei vaticani, e offre camere di design con WiFi gratuito.
        
                          Le sistemazioni sono climatizzate e dotate di pavimenti in gres porcellanato, TV satellitare LCD e cassaforte.
        
                          La Fontana di Trevi e la stazione ferroviaria di Roma Termini sono raggiungibili in 15 minuti a piedi circa.",
            ],
            [
                "title" => "Hu Roma Camping In Town",
                "num_rooms" => "1",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "16",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/34324530.jpg?k=21184736bc1b2a46813e877d9a34f6d2f3d1a3ebc1cb3e6bdbe75b38f8296f1c&o=&hp=1",
                "visible" => "",
                "description" => "Situato a soli 15 minuti d’auto dal Vaticano, il hu Roma Camping In Town offre una piscina stagionale all'aperto, una vasca idromassaggio e un bar a bordo vasca. La struttura dispone di connessione WiFi e parcheggio, entrambi gratuiti.
        
                          Il hu Roma Camping In Town propone chalet e bungalow con aria condizionata.
        
                          Come ospiti della struttura potrete gustare spuntini e bevande durante l’intera giornata presso i vari punti ristoro della struttura.
        
                          Dalla struttura potrete raggiungere la stazione della metropolitana Cornelia (linea A) con un breve tragitto in autobus. L'hotel fornisce anche un servizio navetta a un costo aggiuntivo per il Vaticano e per entrambi gli Aeroporti di Fiumicino e Ciampino.",
            ],
            [
                "title" => "Warrest",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "28",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/165284814.jpg?k=b19e7d2e14e504057688d16e50ce4cf3e40a98263a7b2d3c81b602fccd40be58&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Milano, a 3,6 km dalla GAM e a 3,9 km da Villa Necchi Campiglio, il Warret offre alloggi con WiFi gratuito. A vostra disposizione una sauna.
        
                          Tutte climatizzate, le sistemazioni sono dotate di TV a schermo piatto, frigorifero e bagno privato con bidet. Alcuni alloggi presentano anche un angolo cottura attrezzato con forno a microonde e piano cottura.
        
                          Il Bosco Verticale e la Pinacoteca di Brera distano rispettivamente 4,3 km e 5 km. L’Aeroporto più vicino è quello di Milano-Linate, a 9 km dal Warrest. Avrete modo di usufruire di un servizio di navetta aeroportuale a pagamento.",
            ],
            [
                "title" => "San Nicola central apartment",
                "num_rooms" => "1",
                "num_bed" => "5",
                "num_bath" => "1",
                "square_footage" => "22",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/343825210.jpg?k=dd96080275338a28a26233b06fed2b53691b3175642060d575c759a11cf89548&o=&hp=1",
                "visible" => "",
                "description" => "Situato in una buona posizione a Bari, a breve distanza dal Teatro Margherita, dal Teatro Petruzzelli e da Piazza Mercantile, il San Nicola central apartment offre un ristorante e la connessione WiFi gratuita.
        
                          Tutte le unità sono climatizzate e alcune presentano una TV a schermo piatto, una lavatrice, un bollitore e una cucina.
        
                          L’appartamento propone la colazione all’italiana o a buffet.
        
                          Il San Nicola central apartment dista 2,2 km dalla Cattedrale di Bari e 3,4 km dalla Basilica di San Nicola. L'aeroporto più vicino è quello di Bari Karol Wojtyla, a 10 km. La struttura fornisce un servizio di navetta aeroportuale a pagamento.",
            ],
            [
                "title" => "Garibaldi Rooms",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "25",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/304396173.jpg?k=659bd3efd91b9d06f58a0f3b8765a93827a341a6322c72f24b2e45b5063d501f&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Napoli, a 1,7 km dalla Chiesa dei Santi Filippo e Giacomo e a 2,1 km da Via San Gregorio Armeno, il Garibaldi Rooms offre un salone in comune e il WiFi gratuito.
        
                          Tutte climatizzate, le sistemazioni presentano un balcone, una TV a schermo piatto e un bagno privato con bidet e accappatoi. A un costo aggiuntivo, potrete disporre di asciugamani e biancheria da letto.
        
                          Il bed & breakfast propone la colazione all’italiana.
        
                          Il Garibaldi Rooms dista 2,2 km dal Museo Archeologico Nazionale di Napoli e 2,3 km dal Museo Cappella Sansevero. L’Aeroporto più vicino è quello Internazionale di Napoli, a 5 km.",
            ],
            [
                "title" => "CasaViva - Beautiful Bilo with shared pool in Genova Nervi",
                "num_rooms" => "3",
                "num_bed" => "4",
                "num_bath" => "1",
                "square_footage" => "68",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/313296052.jpg?k=7d1a1db8b767406ced350a32d75baee4d75c265bed88a6c4ad9851575fd571e1&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Genova, a soli 10 km da Via Garibaldi, il CasaViva - Beautiful Bilo with shared pool in Genova Nervi offre un ristorante, una piscina all’aperto stagionale, un giardino e la connessione WiFi gratuita. Provvista del parcheggio privato gratuito, la struttura dista 10 km dall'Università di Genova e 13 km dal Porto di Genova.
        
                          Dotato di 1 camera da letto e TV a schermo piatto, l’alloggio include un angolo cottura completamente attrezzato con lavastoviglie, forno, microonde, lavatrice e frigorifero. Potrete inoltre usufruire di lenzuola e asciugamani.
        
                          Il CasaViva - Beautiful Bilo with shared pool in Genova Nervi si trova a 9 km da Porta Soprana e da Piazza Corvetto, e a 16 km dall'Aeroporto di Genova Cristoforo Colombo, lo scalo più vicino.",
            ],
            [
                "title" => "Spezier Design Venetian Studio",
                "num_rooms" => "2",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "45",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/132644886.jpg?k=ac289acd8fe7bc03911e4812052c3263e5a0979f7833474d2f21aeb3bafa585f&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Venezia, a 200 m dalla Ca' d'Oro e a 7 minuti a piedi dal Ponte di Rialto, lo Spezier offre sistemazioni con cucina. La Basilica di San Marco si trova a 1 km dall'appartamento.
        
                          Ampio monolocale a pianta aperta con TV e zona notte rialzata. Il monolocale dispone anche di un bagno con vasca.
        
                          La struttura dista 13 minuti a piedi da Piazza San Marco. L'Aeroporto più vicino è quello di Venezia-Marco Polo, a 7 km.",
            ],
            [
                "title" => "Villa Smeralda",
                "num_rooms" => "4",
                "num_bed" => "4",
                "num_bath" => "1",
                "square_footage" => "70",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/302412943.jpg?k=2db22764a3cc2d720f63380f773517ab984978719178d78963940dd83c88d604&o=&hp=1",
                "visible" => "",
                "description" => "Immersa nell'Area Marina Protetta del Plemmirio, a 9 km da Siracusa e a 200 metri dalle spiagge del Plemmirio, la Villa Smeralda vanta giardini fioriti e appartamenti in stile classico.
        
                          Gli alloggi dispongono di dettagli e mobili in legno, TV, viste sul giardino, angolo cottura e bagno con asciugacapelli.
        
                          Da giugno a ottobre potrete usufruire della piscina all'aperto attrezzata con lettini e ombrelloni. Il WiFi è gratuito nelle aree comuni.
        
                          La proprietà dista 100 metri dal negozio di alimentari più vicino e 1 km da un ristorante siciliano.
        
                          Dotata di un servizio navetta da/per l'Aeroporto di Catania, la Villa Smeralda dista 10 minuti in auto dalla spiaggia di Arenella e 15 minuti in auto dalla spiaggia di Fontane Bianche.",
            ],
            [
                "title" => "Residenza Florentia",
                "num_rooms" => "1",
                "num_bed" => "2",
                "num_bath" => "1",
                "square_footage" => "22",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/278972363.jpg?k=04876bbcb3a4da95ecf2f4062907cc9af9df45a212a42c3c447f2ce470a2f3bb&o=&hp=1",
                "visible" => "",
                "description" => "L'Residenza Florentia propone camere climatizzate dotate di arredi semplici, TV LCD satellitare e bagno privato e occupa una posizione centrale di Firenze, a 5 minuti a piedi dalla stazione ferroviaria Santa Maria Novella e dal Duomo.
        
                          L'Residenza Florentia dista 600 metri da Ponte Vecchio e dalla Galleria degli Uffizi, mentre in 5 minuti a piedi potrete raggiungere Piazza della Repubblica, una delle piazze principali di Firenze.
        
                          Le sistemazioni offrono pavimenti piastrellati, arredi in legno e chiavi magnetiche, che vi verranno consegnate al check-in e vi permetteranno di accedere alla struttura 24 ore su 24. Nelle vicinanze troverete numerosi caffè e ristoranti, dove potrete gustare colazione, pranzo e cena.",
            ],
            [
                "title" => "Gialel Pisa Guest House",
                "num_rooms" => "1",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "21",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/239231461.jpg?k=88a7b0cad51a17f30bd11df074cc162ddf764d13baadb84ae6c5c3aaf0f03523&o=&hp=1",
                "visible" => "",
                "description" => "Situata in una posizione ideale nel centro di Pisa, la Gialel Pisa Guest House offre camere climatizzate, un salone in comune e la connessione WiFi gratuita. La struttura dista circa 200 metri dall'Orto Botanico cittadino, e 300 metri da Piazza dei Cavalieri e dalla Normale di Pisa. La struttura dispone di sistemazioni familiari.
        
                          Le camere sono dotate di scrivania, TV a schermo piatto, bagno privato, lenzuola e asciugamani. In ogni sistemazione troverete un armadio.
        
                            I luoghi di interesse nelle vicinanze della Gialel Pisa Guest House includono la Torre Pendente, il Duomo di Pisa e Piazza dei Miracoli. L’aeroporto più vicino è quello Internazionale di Pisa, a 2 km.",
            ],
            [
                "title" => "Tropicana Room",
                "num_rooms" => "2",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "30",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1280x900/178235589.jpg?k=7b004a512d80eb539d046396ae4c516f8249084721cd302ffd0ef491c0d4cdb0&o=&hp=1",
                "visible" => "",
                "description" => "Situato a Caserta, a 400 metri dalla Reggia di Caserta e a 1 km dalla Seconda Università degli Studi di Napoli, il B&B Tropicana Room offre sistemazioni climatizzate con vista sulla città e connessione WiFi gratuita.
        
                          Le unità abitative del bed & breakfast presentano una TV a schermo piatto e un bagno privato con accappatoi, pantofole e bidet. Alcune sistemazioni sono dotate anche di area salotto e/o balcone.
        
                          Presso il B&B Tropicana Room vi attende al mattino una colazione alla carta o all’italiana.
        
                          A vostra disposizione in loco il servizio di autonoleggio.
        
                          Il B&B Tropicana Room dista 1,9 km dall’Università Popolare di Caserta e dall’Azienda Ospedaliera Sant’Anna e San Sebastiano. A 29 km troverete l’Aeroporto Internazionale di Napoli-Capodichino, lo scalo più vicino. Usufruirete anche del servizio di navetta aeroportuale a un costo aggiuntivo.",
            ],
            [
                "title" => "G.H. Polignano a Mare",
                "num_rooms" => "2",
                "num_bed" => "3",
                "num_bath" => "1",
                "square_footage" => "55",
                "preview" => "https://cf.bstatic.com/xdata/images/hotel/max1024x768/69394094.jpg?k=beff5ff76097b0b2880296f454fb77b146152c0468da778a3366b5e0d67cf4d2&o=&hp=1",
                "visible" => "",
                "description" => "Questa struttura si trova a 5 minuti a piedi dalla spiaggia. Situato a Polignano a Mare, a meno di 400 metri dalla Spiaggia di Lama Monachile e a meno di 1 km dal Lido Cala Paura, il G.H. Polignano a Mare offre sistemazioni con area salotto. A vostra disposizione inoltre la connessione WiFi gratuita e un parcheggio privato in loco.
        
                          In tutte le unità abitative troverete l’aria condizionata, una TV a schermo piatto, un soggiorno con divano, una cucina ben accessoriata con zona pranzo e 1 bagno privato con bidè, accappatoi e asciugacapelli. Non mancano inoltre un frigorifero, un forno, un piano cottura e un bollitore.
        
                          La struttura dista 48 km dall’Aeroporto di Bari-Karol Wojtyla, lo scalo più vicino.",
            ],
        ];

        for ($i=0; $i < 10; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 1 ;
            $newApartment->title = $apartments[$i]['title'];
            $newApartment->num_rooms = $apartments[$i]['num_rooms'];
            $newApartment->num_beds = $apartments[$i]['num_bed'];
            $newApartment->num_bath = $apartments[$i]['num_bath'];
            $newApartment->num_guest = $apartments[$i]['num_bed'];
            $newApartment->price = 10 + ($apartments[$i]['num_bed'] * 15);
            $newApartment->square_footage = $apartments[$i]['square_footage'];
            $newApartment->preview = $apartments[$i]['preview'];
            $newApartment->visible = rand(0, 1);
            $newApartment->description =  $apartments[$i]['description'];           
            $newApartment->save();
        }

        for ($i=0; $i < 10; $i++) { 
            $newApartment = new Apartment();
            
            $newApartment->user_id = 2 ;
            $newApartment->title = $apartments[$i + 10]['title'];
            $newApartment->num_rooms = $apartments[$i + 10]['num_rooms'];
            $newApartment->num_beds = $apartments[$i + 10]['num_bed'];
            $newApartment->num_bath = $apartments[$i + 10]['num_bath'];
            $newApartment->num_guest = $apartments[$i + 10]['num_bed'];
            $newApartment->price = 10 + ($apartments[$i + 10]['num_bed'] * 15);
            $newApartment->square_footage = $apartments[$i + 10]['square_footage'];
            $newApartment->preview = $apartments[$i + 10]['preview'];
            $newApartment->visible = rand(0, 1);
            $newApartment->description =  $apartments[$i + 10]['description'];           
            $newApartment->save();
        }
    }
}
