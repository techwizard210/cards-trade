@extends('frontend.layout.app')

@section('content')

<div class="page-header" style="background: no-repeat 60%/cover url({{ asset('assets/images/elements/policy-header.jpg') }});">
    <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb" style="color: #222529;">
                    <li class="breadcrumb-item"><a href="{{ route('home', app()->getLocale()) }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('title.privacy_policy') }}</li>
                </ol>
            </div>
        </nav>
        <h1>{{ __('title.privacy_policy') }}</h1>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="big_title mb-3 mt-4">
            <h1 class="mb-0 text-uppercase" style="font-weight: 900; font-size: 45px;">ELEGANCE  {{ __('title.privacy_policy') }}</h1>
            <h3>Dein Recht auf Datenschutz</h3>
            <a class="buying_guide_continue" href="{{ route('products', app()->getLocale()) }}">{{ __('title.buttons.continue_shopping') }}</a>
        </div>
        <div class="clear"></div>
        <div class="about_content about_content_2">
            <div class="entry-content">
                <p>Elegance Kontaktlinsen erhebt, verarbeitet und nutzt personenbezogene Daten eines Nutzers / Kunden ausschließlich für die Vertragsbegründung und -abwicklung sowie zu Abrechnungszwecken. Diese so genannten Bestandsdaten sind insbesondere:</p>
                <ul>
                <li>Anrede</li>
                <li>Titel</li>
                <li>Vorname und Nachname</li>
                <li>Firma (optional)</li>
                <li>Straße/Nr</li>
                <li>Adressenzusatz</li>
                <li>PLZ</li>
                <li>Ort</li>
                <li>Telefon (optional)</li>
                <li>Mobiltelefon</li>
                <li>Fax (optional)</li>
                <li>E-Mailadresse</li>
                <li>Geburtsdatum</li>
                </ul>
                <p><strong>Einsatz von Cookies</strong></p>
                <p>Während der Nutzung unseres Onlineshops und des Onlinebestellvorgangs wird auf deinem Computer ein so genanntes „Cookie“ gespeichert. Dies dient nicht der Auswertung deines Nutzerverhaltens o.ä. Vielmehr dient das Cookie ausschließlich, um deine Autorisierung sicherzustellen.</p>
                <p><strong>Weitergabe von Daten an Dritte</strong></p>
                <p>Elegance Kontaktlinsen gibt keinerlei personenbezogene Daten ohne deine ausdrückliche und jederzeit widerrufliche Einwilligung an Dritte weiter und stellt diese Dritten auch nicht in sonstiger Form zur Verfügung.</p>
                <p><strong>Recht auf Auskunft, Berichtigung und Löschung</strong></p>
                <p>Du hast das Recht, jederzeit eine unentgeltliche Auskunft über deine bei uns gespeicherten personenbezogenen Daten einzuholen. Ferner hast du das Recht, die bei uns gespeicherten personenbezogenen Daten kostenlos berichtigen, löschen oder sperren zu lassen.</p>
                <p><strong>Haftungsausschluss</strong></p>
                <p>Der Autor übernimmt keinerlei Gewähr hinsichtlich der inhaltlichen Richtigkeit, Genauigkeit, Aktualität, Zuverlässigkeit und Vollständigkeit der Informationen.</p>
                <p>Haftungsansprüche gegen den Autor wegen Schäden materieller oder immaterieller Art, welche aus dem Zugriff oder der Nutzung bzw. Nichtnutzung der veröffentlichten Informationen, durch Missbrauch der Verbindung oder durch technische Störungen entstanden sind, werden ausgeschlossen.</p>
                <p>Alle Angebote sind unverbindlich. Der Autor behält es sich ausdrücklich vor, Teile der Seiten oder das gesamte Angebot ohne gesonderte Ankündigung zu verändern, zu ergänzen, zu löschen oder die Veröffentlichung zeitweise oder endgültig einzustellen.</p>
                <p><strong>Haftung für Links</strong></p>
                <p>Verweise und Links auf Webseiten Dritter liegen ausserhalb unseres Verantwortungsbereichs Es wird jegliche Verantwortung für solche Webseiten abgelehnt. Der Zugriff und die Nutzung solcher Webseiten erfolgen auf eigene Gefahr des Nutzers oder der Nutzerin.</p>
                <p><strong>Urheberrechte</strong></p>
                <p>Die Urheber- und alle anderen Rechte an Inhalten, Bildern, Fotos oder anderen Dateien auf der Website gehören ausschliesslich der Firma<strong> Elegance Kontaktlinsen (elegance-linsen.ch)</strong> oder den speziell genannten Rechtsinhabern. Für die Reproduktion jeglicher Elemente ist die schriftliche Zustimmung der Urheberrechtsträger im Voraus einzuholen.</p>
                <p><strong>Datenschutz</strong></p>
                <p>Gestützt auf Artikel 13 der schweizerischen Bundesverfassung und die datenschutzrechtlichen Bestimmungen des Bundes (Datenschutzgesetz, DSG) hat jede Person Anspruch auf Schutz ihrer Privatsphäre sowie auf Schutz vor Missbrauch ihrer persönlichen Daten. Wir halten diese Bestimmungen ein. Persönliche Daten werden streng vertraulich behandelt und weder an Dritte verkauft noch weitergegeben.</p>
                <p>In enger Zusammenarbeit mit unseren Hosting-Providern bemühen wir uns, die Datenbanken so gut wie möglich vor fremden Zugriffen, Verlusten, Missbrauch oder vor Fälschung zu schützen.</p>
                <p>Beim Zugriff auf unsere Webseiten werden folgende Daten in Logfiles gespeichert: IP-Adresse, Datum, Uhrzeit, Browser-Anfrage und allg. übertragene Informationen zum Betriebssystem resp. Browser. Diese Nutzungsdaten bilden die Basis für statistische, anonyme Auswertungen, so dass Trends erkennbar sind, anhand derer wir unsere Angebote entsprechend verbessern können.</p>
                <p><strong>Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)</strong></p>
                <p>Auf unseren Seiten sind Plugins des sozialen Netzwerks Facebook, 1601 South California Avenue, Palo Alto, CA 94304, USA integriert. Die Facebook-Plugins erkennen Sie an dem Facebook-Logo oder dem „Like-Button“ („Gefällt mir“) auf unserer Seite. Eine Übersicht über die Facebook-Plugins finden Sie hier: http://developers.facebook.com/docs/plugins/.</p>
                <p>Wenn Sie unsere Seiten besuchen, wird über das Plugin eine direkte Verbindung zwischen Ihrem Browser und dem Facebook-Server hergestellt. Facebook erhält dadurch die Information, dass Sie mit Ihrer IP-Adresse unsere Seite besucht haben. Wenn Sie den Facebook „Like-Button“ anklicken während Sie in Ihrem Facebook-Account eingeloggt sind, können Sie die Inhalte unserer Seiten auf Ihrem Facebook-Profil verlinken. Dadurch kann Facebook den Besuch unserer Seiten Ihrem Benutzerkonto zuordnen. Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der übermittelten Daten sowie deren Nutzung durch Facebook erhalten. Weitere Informationen hierzu finden Sie in der Datenschutzerklärung von Facebook unter https://www.facebook.com/about/privacy/</p>
                <p>Wenn Sie nicht wünschen, dass Facebook den Besuch unserer Seiten Ihrem Facebook-Nutzerkonto zuordnen kann, loggen Sie sich bitte aus Ihrem Facebook-Benutzerkonto aus.</p>
                <p><strong>Datenschutzerklärung für die Nutzung von Twitter</strong></p>
                <p>Auf unseren Seiten sind Funktionen des Dienstes Twitter eingebunden. Diese Funktionen werden angeboten durch die Twitter Inc., 795 Folsom St., Suite 600, San Francisco, CA 94107, USA. Durch das Benutzen von Twitter und der Funktion „Re-Tweet“ werden die von Ihnen besuchten Webseiten mit Ihrem Twitter-Account verknüpft und anderen Nutzern bekannt gegeben. Dabei werden u.a. Daten wie IP-Adresse, Browsertyp, aufgerufene Domains, besuchte Seiten, Mobilfunkanbieter, Geräte- und Applikations-IDs und Suchbegriffe an Twitter übertragen.</p>
                <p>Wir weisen darauf hin, dass wir als Anbieter der Seiten keine Kenntnis vom Inhalt der übermittelten Daten sowie deren Nutzung durch Twitter erhalten. Aufgrund laufender Aktualisierung der Datenschutzerklärung von Twitter, weisen wir auf die aktuellste Version unter (http://twitter.com/privacy) hin.</p>
                <p>Ihre Datenschutzeinstellungen bei Twitter können Sie in den Konto-Einstellungen unter http://twitter.com/account/settings ändern. Bei Fragen wenden Sie sich an privacy@twitter.com.</p>
                <p><strong>Datenschutzerklärung für die Nutzung von Google Analytics</strong></p>
                <p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. („Google“). Google Analytics verwendet sog. „Cookies“, Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch das Cookie erzeugten Informationen über Ihre Benutzung dieser Website werden in der Regel an einen Server von Google in den USA übertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf dieser Webseite wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der Europäischen Union oder in anderen Vertragsstaaten des Abkommens über den Europäischen Wirtschaftsraum zuvor gekürzt.</p>
                <p>Nur in Ausnahmefällen wird die volle IP-Adresse an einen Server von Google in den USA übertragen und dort gekürzt. Google wird diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für die Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen. Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich vorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten. Die im Rahmen von Google Analytics von Ihrem Browser übermittelte IP-Adresse wird nicht mit anderen Daten von Google zusammengeführt.</p>
                <p>Sie können die Installation der Cookies durch eine entsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website voll umfänglich nutzen können. Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.</p>
                <p><strong>Datenschutzerklärung für die Nutzung von Google +1</strong></p>
                <p>Mithilfe der Google +1-Schaltfläche können Sie Informationen weltweit veröffentlichen. Über die Google +1-Schaltfläche erhalten Sie und andere Nutzer personalisierte Inhalte von Google und dessen Partnern. Google speichert sowohl die Information, dass Sie für einen Inhalt +1 gegeben haben, als auch Informationen über die Seite, die Sie beim Klicken auf +1 angesehen haben. Ihre +1 können als Hinweise zusammen mit Ihrem Profilnamen und Ihrem Foto in Google-Diensten, wie etwa in Suchergebnissen oder in Ihrem Google-Profil, oder an anderen Stellen auf Websites und Anzeigen im Internet eingeblendet werden.</p>
                <p>Google zeichnet Informationen über Ihre +1-Aktivitäten auf, um die Google-Dienste für Sie und andere zu verbessern.</p>
                <p>Um die Google +1-Schaltfläche verwenden zu können, benötigen Sie ein weltweit sichtbares, öffentliches Google-Profil, das zumindest den für das Profil gewählten Namen enthalten muss. Dieser Name wird in allen Google-Diensten verwendet. In manchen Fällen kann dieser Name auch einen anderen Namen ersetzen, den Sie beim Teilen von Inhalten über Ihr Google-Konto verwendet haben. Die Identität Ihres Google-Profils kann Nutzern angezeigt werden, die Ihre E-Mail-Adresse kennen oder über andere identifizierende Informationen von Ihnen verfügen.</p>
                <p>Neben den oben erläuterten Verwendungszwecken werden die von Ihnen bereitgestellten Informationen gemäß den geltenden Google-Datenschutzbestimmungen (http://www.google.com/intl/de/policies/privacy/) genutzt. Google veröffentlicht möglicherweise zusammengefasste Statistiken über die +1-Aktivitäten der Nutzer bzw. geben diese Statistiken an unsere Nutzer und Partner weiter, wie etwa Publisher, Inserenten oder verbundene Websites.</p>
                <p><strong>Impressum</strong></p>
                <p><strong>Kontaktadresse</strong></p>
                <p>Elegance Kontaktlinsen<br>
                Osman Poslu<br>
                Oberdorfstrasse 30<br>
                CH-8953 Dietikon</p>
                <p>+41 (0) 76 489 7712<br>
                info@elegance-linsen.ch</p>
                <p><strong>Vertretungsberechtigte Personen</strong></p>
                <p>Osman Poslu</p>
                <p>Dietikon, 01.09.2019</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

@endsection
