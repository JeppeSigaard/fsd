<form action="<?php echo admin_url('admin-ajax.php'); ?>" class="signup-form">
    <input type="hidden" name="action" value="smamo_signup">
    <?php wp_nonce_field('smamo_signup','smamo_signup_nonce') ?>
    <div>
        <h4>Medlemsoplysninger</h4>
    </div>
    <div>
        <input name="name" type="text" required>
        <label for="name">Dit navn (fornavn og efternavn)</label>    
    </div>
    <div class="split">
       <div>
           <input name="email" type="email" required>
            <label for="email">Primær e-mailadresse</label> 
       </div>
        <div>
            <input name="phone" type="text" required>
            <label for="phone">Telefonnummer</label>
        </div>
    </div>
    <div>
        <h4>Ansættelsesoplysninger</h4>
    </div>
    <div>
        <select name="work">
            <option selected disbaled class="select-hidden">
            </option><option>Amager Hospital
            </option><option>Amtshospitalet Nykøbing Sjælland
            </option><option>Amtssygehuset Esbjerg
            </option><option>Amtssygehuset i Fakse
            </option><option>Amtssygehuset i Stege
            </option><option>Amtssygehuset Nakskov
            </option><option>Andersvænge, Vestsj. Amt
            </option><option>Behandlingscentret Sundbyvang
            </option><option>Birkebjergparken
            </option><option>Bispebjerg Hospital
            </option><option>Bornholms Hospital
            </option><option>Brovst Sygehus
            </option><option>Brønderslev Psykiatriske Sygehus
            </option><option>Bystævneparken
            </option><option>Center for Sundhed og Træning
            </option><option>Centralinstitutionen Lillemosegård
            </option><option>De Gamles By
            </option><option>Distrikssygehuset i Jacobshavn
            </option><option>Dronning Ingrids Hospital
            </option><option>Dronninglund Sygehus
            </option><option>Fakse Sygehus
            </option><option>Fredericia og Kolding Sygehuse, Fredericia
            </option><option>Fredericia og Kolding Sygehuse, Kolding
            </option><option>Frederiksberg Hospital
            </option><option>Frederiksborg Amts sygehusvaskeri
            </option><option>Fødevaredirektoratet
            </option><option>Gentofte Hospital
            </option><option>Grenå Centralsygehus
            </option><option>Herlev Hospital
            </option><option>Hobro Sygehus
            </option><option>Holbæk sygehus
            </option><option>Hospitalsenhed Midt
            </option><option>Hospitalsenhed Midt.
            </option><option>Hospitalsenheden Vest
            </option><option>Hvidovre Hospital
            </option><option>Hørsholm Sygehus
            </option><option>H.Lundbeck A/S
            </option><option>Institutionerne på Strandv.
            </option><option>Klaksvig Sygehus
            </option><option>Kolonien Filadelfia
            </option><option>Kong Chr.d.x.s. Gigthospital
            </option><option>Københavns Universitet Amager
            </option><option>Københavns Universitet,Teknisk Service
            </option><option>Køge Sygehus
            </option><option>Køge Sygehus
            </option><option>K.A.S. Centralapotek
            </option><option>K.A.S. Herlev,Psyk.afd.Ballerup
            </option><option>Landssjúkrahúsið
            </option><option>Leivsgøta
            </option><option>Marselisborg Centret
            </option><option>Nordsjællands Hospital, Frederikssund
            </option><option>Nordsjællands Hospital, Helsingør
            </option><option>Nordsjællands Hospital, Hillerød
            </option><option>Nykøbing Falster Sygehus
            </option><option>Odense Universitetshospital
            </option><option>OUH Svendborg Sygehus
            </option><option>OUH/Middelfart sygehus
            </option><option>OUH/Middelfart Sygehus, Servicecentret
            </option><option>Panum Instituttet
            </option><option>Plejehospitalet Bystævneparken
            </option><option>Privathospitalet Hamlet
            </option><option>Psykiatricenter Midt, Augustenborg
            </option><option>Psykiatrien Vordingborg
            </option><option>Psykiatrisk center Ballerup
            </option><option>Psykiatrisk Center Sct. Hans
            </option><option>Regionshospitalet Brædstrup
            </option><option>Regionshospitalet Herning
            </option><option>Regionshospitalet Holstebro
            </option><option>Regionshospitalet Horsens
            </option><option>Regionshospitalet Lemvig
            </option><option>Regionshospitalet Odder
            </option><option>Regionshospitalet Randers
            </option><option>Regionshospitalet Ringkøbing
            </option><option>Regionshospitalet Silkeborg
            </option><option>Regionshospitalet Skive
            </option><option>Regionshospitalet Tarm
            </option><option>Regionshospitalet Viborg
            </option><option>Regionssygehuset Næstved
            </option><option>Regionssygehus Næstved
            </option><option>Ribe Sundhedscenter
            </option><option>Ribelund, Teknisk afd.
            </option><option>Rigshospitalet
            </option><option>Rigshospitalets Maskinafdeling Afsnit 5601
            </option><option>Rigshospitalet, Glostrup
            </option><option>Ringsted Sygehus
            </option><option>Roskilde Sygehus
            </option><option>Saxenhøj, Teknisk Afd.
            </option><option>Sct. Josephs Hospital
            </option><option>Skanderborg Sundhedscenter
            </option><option>Statens Seruminstitut
            </option><option>Storstrømmens Sygehus Nakskov
            </option><option>Strandvænget
            </option><option>Suduroyar Sjukrahus
            </option><option>Svaneparken, Birkerød
            </option><option>Sydvestjysk Sygehus, Esbjerg
            </option><option>Sydvestjysk Sygehus, Grindsted
            </option><option>Sygehus Fyn, Assens
            </option><option>Sygehus Fyn, Fåborg
            </option><option>Sygehus Fyn, Nyborg
            </option><option>Sygehus Fyn, Ringe
            </option><option>Sygehus Fyn, Rudkøbing
            </option><option>Sygehus Fyn, Ærøskøbing
            </option><option>Sygehus Himmerland, Farsø
            </option><option>Sygehus Nord, Nykøbing Mors Sygehus
            </option><option>Sygehus Syd, Slagelse Sygehus
            </option><option>Sygehus Sønderjylland
            </option><option>Sygehus Sønderjylland Haderslev
            </option><option>Sygehus Sønderjylland Sønderborg
            </option><option>Sygehus Sønderjyllland
            </option><option>Sygehus Thy-Mors, Nykøbing
            </option><option>Sygehus Thy-Mors, Thisted
            </option><option>Sygehus Vendsyssel
            </option><option>Sygehus Vendsyssel
            </option><option>Sygehus Vest, Slagelse
            </option><option>Sødisbakke
            </option><option>Sølund
            </option><option>Sønderborg Sygehus
            </option><option>Tønder Sygehus
            </option><option>Varde sygehus
            </option><option>Vejle Amtsgård
            </option><option>Vejle Amt, Amtsgården
            </option><option>Vejle og Give Sygehuse, Give
            </option><option>Vejle og Give Sygehuse, Vejle
            </option><option>Vordingborg Sygehus
            </option><option>Århus Amtssygehus
            </option><option>Århus Kommunehospital
            </option><option>Århus Sygehus, P.P.Ørumsgade
            </option><option>Århus Sygehus,Nørrebrogade
            </option><option>Århus Sygehus,Tage Hansens Gade
            </option><option>Århus Universitetshospital, Risskov
            </option><option>Århus Universitetshospital, Skejby
            </option><option>Aalborg Psykiatriske Sygehus
            </option><option>Aalborg Sygehus
            </option><option>Aasiaat Sygehus</option>
        </select>
        <label for="work">Ansættelsessted</label>    
    </div>
    <div>
        <select name="position">
<option selected disbaled class="select-hidden">
</option><option>1.Maskinmester
</option><option>Arkitekt
</option><option>Bygningskonstruktør
</option><option>Byggeteknisk Chef
</option><option>Funktionsleder
</option><option>Ingeniør
</option><option>Konstruktør
</option><option>Maskin teknikker
</option><option>Maskinmeeistari
</option><option>Maskinmester
</option><option>Maskintekniker
</option><option>Medicoingeniør
</option><option>Overmaskinmester
</option><option>Overmontør
</option><option>Sektionsleder
</option><option>Teknisk Chef
</option><option>Teknisk Planlægningschef
</option><option>Teknisk souschef
</option><option>Varmemester
</option><option>Værkstedsleder
</option><option>Funktionschef
</option><option>Energikoordinator
</option><option>Entreprenør
</option><option>Teknik
</option><option>Kvalitetskoordinator
</option><option>Driftschef
</option><option>Driftteknisk Chef
</option><option>Maskinchef
</option><option>Pensionist
</option><option>Funktionschef
</option><option>Chef for FBE Teknik
</option><option>Energi-og KS-koordinator
</option><option>Teknisk seniorkonsulent
</option><option>Teknisk stabsleder
</option><option>Elmester
</option><option>Driftsmester
</option><option>1.Maskinmester
</option><option>Arkitekt
</option><option>Bygningskonstruktør
</option><option>Byggeteknisk Chef
</option><option>Funktionsleder
</option><option>Ingeniør
</option><option>Konstruktør
</option><option>Maskin teknikker
</option><option>Maskinmeeistari
</option><option>Maskinmester
</option><option>Maskintekniker
</option><option>Medicoingeniør
</option><option>Overmaskinmester
</option><option>Overmontør
</option><option>Sektionsleder
</option><option>Teknisk Chef
</option><option>Teknisk Planlægningschef
</option><option>Teknisk souschef
</option><option>Varmemester
</option><option>Værkstedsleder
</option><option>Funktionschef
</option><option>Energikoordinator
</option><option>Entreprenør
</option><option>Teknik
</option><option>Kvalitetskoordinator
</option><option>Driftschef
</option><option>Driftteknisk Chef
</option><option>Maskinchef
</option><option>Pensionist
</option><option>Funktionschef
</option><option>Chef for FBE Teknik
</option><option>Energi-og KS-koordinator
</option><option>Teknisk seniorkonsulent</option></select>
        <label for="position">Stilling</label>
    </div>
    <div>
        <h4>Personlige oplysninger</h4>
    </div>
    <div>
        <input name="birthday" type="text" required>
        <label for="birthday">Fødesldato</label>    
    </div>
    <div>
        <input name="address" type="text" required>
        <label for="address">Adresse</label>    
    </div>
    <div class="split">
        <div>
            <input name="post" type="text" required>
            <label for="post">Postnummer</label> 
        </div>
        <div>
            <input name="by" type="text" required>
            <label for="by">By</label> 
        </div>  
    </div>
    <div>
        <h4>Bemærkninger</h4>
    </div>
    <div>
        <textarea name="remarks" rows="1"></textarea>
        <label for="remarks">Eventuelle bemærkninger</label>
    </div>
    <div class="right">
        <a href="#" class="signup submit arrow-link">Indsend anmodning om medlemsskab</a>
    </div>
</form>