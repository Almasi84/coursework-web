function mutat(mit){
    document.getElementById(mit).style.visibility = "visible";
    document.getElementById(mit).style.display = "block";
}
function becsuk(mit){
    document.getElementById(mit).style.visibility = "hidden";
    document.getElementById(mit).style.display = "none"; 
}
function bejelentkezes(){
    var formData = new FormData();
    formData.append('fnev', document.getElementById("fnev").value);
    formData.append('jelszo', document.getElementById("jelszo").value);
    kuld("./bejelentkezes.php", formData, "felhasznalo");
    document.getElementById("fnev").value = "";
    document.getElementById("jelszo").value = "";
    becsuk("bejelentkezes");
    location.reload();
}

function kuld(cim, mit, hova) {
    var httprequest = new XMLHttpRequest();
    httprequest.open("POST", cim, true);
    httprequest.onreadystatechange = function () {
        if (httprequest.readyState == 4 && httprequest.status == 200) {
            document.getElementById(hova).innerHTML = httprequest.responseText;
        }
    }
    httprequest.send(mit);
}
function kuld2(cim, valtozok, hova) {
    var httpreq = new XMLHttpRequest();
    httpreq.open("POST", cim, true);
    httpreq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpreq.onreadystatechange = function () {
        if (httpreq.readyState == 4 && httpreq.status == 200) {
            document.getElementById(hova).innerHTML = httpreq.responseText;
        }
    }
    httpreq.send(valtozok);
}

function termek_keres(){
    var parameter = "mondat=SELECT * from termek";
                var termeknev = document.getElementById('termeknev').value;
                var gyartok = document.getElementById('gyarto').value;
                var darab = document.getElementById('darab').value;
                var elerheto = document.querySelector('input[name="elerheto"]:checked').value;
                if (termeknev == "" && gyartok == 0) {parameter = parameter + " where elo_termek ="+elerheto+"" } 
                if (termeknev != "") { parameter = parameter + " where termeknev LIKE \"%"+termeknev+"%\" and elo_termek ="+elerheto+""}
                if (gyartok != 0 && darab == 0) {
                        if (parameter.indexOf("where") > (-1)) {
                            parameter = parametert+" and gyarto=\""+gyartok+"\" and elo_termek ="+elerheto+"";
                        } else {
                            parameter = parameter+" where gyarto=\""+gyartok+"\" and elo_termek ="+elerheto+"";
                        }
                }
                if (gyartok != 0 && darab != 0) {
                        if (parameter.indexOf("where") > (-1)) {
                            parameter = parameter+" and gyarto=\""+gyartok+"\" and darab ="+darab+" and elo_termek ="+elerheto+"";
                        } else {
                            parameter = parameter+" where gyarto=\""+gyartok+"\" and darab ="+darab+" and elo_termek ="+elerheto+"";
                        }
                    
                }
    kuld2('./termek_kereses.php', parameter, 'adatok');
}

function keres(){
    var formData = new FormData();
    formData.append('fnev', document.getElementById("fnev").value);
    formData.append('nev', document.getElementById("nev").value);
    kuld("./kereses.php", formData, "adatok");
}

function modosit(kit){
    var formData = new FormData();
    formData.append('userid', kit);
    if (kit == 0){
        document.getElementById('ujfelhasznalo').style.visibility = "hidden";
    }
    kuld("./felhmodosit.php", formData, "felhasznalo");
}

function termekmod(kit){
    var formData = new FormData();
    formData.append('termekid', kit);
    if (kit == 0){
        document.getElementById('ujtermek').style.visibility = "hidden";
    }
    kuld("./termek_modosit.php", formData, "termekek");
}

function felhmodosit(){
    var formData = new FormData();
    formData.append('userid', document.getElementById("userid").value);
    formData.append('nev', document.getElementById("modnev").value);
    formData.append('username', document.getElementById("username").value);
    formData.append('password', document.getElementById("password").value);
    formData.append('irszam', document.getElementById("irszam").value);
    formData.append('telepules', document.getElementById("telepules").value);
    formData.append('kterulet', document.getElementById("kterulet").value);
    formData.append('hszam', document.getElementById("hszam").value);
    formData.append('telszam', document.getElementById("telszam").value);
    formData.append('adoszam', document.getElementById("adoszam").value);
    formData.append('jog', document.getElementById("jog").value);

    kuld("./felhmodositas.php", formData, "felhasznalo");

}

function termekmodosit(){ 
    var formData = new FormData();
    formData.append('termekid', document.getElementById("termekid").value);
    formData.append('termeknev', document.getElementById("modnev").value);
    formData.append('gyarto', document.getElementById("gyarto2").value);
    formData.append('szelesseg', document.getElementById("szelesseg").value);
    formData.append('hossz', document.getElementById("hossz").value);
    formData.append('darab', document.getElementById("darab2").value);
    formData.append('kategoria', document.getElementById("kategoria").value);
    formData.append('termekar', document.getElementById("termekar").value);
    formData.append('akcio', document.getElementById("akcio").value);
    formData.append('elo_termek', document.getElementById("elo_termek").value);
    kuld("./termek_modositas.php", formData, "termekek");
}

function felhuj(){
    var formData = new FormData();
    formData.append('nev', document.getElementById("modnev").value);
    formData.append('username', document.getElementById("username").value);
    formData.append('password', document.getElementById("password").value);
    formData.append('irszam', document.getElementById("irszam").value);
    formData.append('telepules', document.getElementById("telepules").value);
    formData.append('kterulet', document.getElementById("kterulet").value);
    formData.append('hszam', document.getElementById("hszam").value);
    formData.append('telszam', document.getElementById("telszam").value);
    formData.append('adoszam', document.getElementById("adoszam").value);
    formData.append('jog', document.getElementById("jog").value);
    
    kuld("./felhuj.php", formData, "felhasznalo");
    document.getElementById('ujfelhasznalo').style.visibility = "visible";
}

function termekuj(){
    alert("!");
    var formData = new FormData();
    formData.append('termeknev', document.getElementById("modnev").value);
    formData.append('gyarto', document.getElementById("gyarto2").value);
    formData.append('szelesseg', document.getElementById("szelesseg").value);
    formData.append('hossz', document.getElementById("hossz").value);
    formData.append('darab', document.getElementById("darab2").value);
    formData.append('kategoria', document.getElementById("kategoria").value);
    formData.append('termekar', document.getElementById("termekar").value);
    formData.append('akcio', document.getElementById("akcio").value);
    formData.append('elo_termek', document.getElementById("elo_termek").value);
    kuld("./termek_uj.php", formData, "termekek");
    
    document.getElementById('ujtermek').style.visibility = "visible";
}

function megse(){
    document.getElementById('ujfelhasznalo').style.visibility = "visible";
    document.getElementById('felhasznalo').innerHTML = "";
}

function megse2(){
    document.getElementById('ujtermek').style.visibility = "visible";
    document.getElementById('termekek').innerHTML = "";
}

function darab_kereses() {
    if (document.getElementById('gyarto').value == "") {
        document.getElementById('darab').innerHTML = '0';        
    } else {
        parameter = "gyarto=" + document.getElementById('gyarto').value;
        kuld2('darab.php', parameter, 'darab');        
    }    
}

function kosarba(id){
	document.getElementById('uzenet').style.display = "block";
    document.getElementById('uzenet').style.visibility = "visible";
    var db = document.getElementById(id).value;	
    if (db==0){
        alert("0 darab terméket kívánt a kosárba helyezni");
    } else {
        var formData = new FormData();
        formData.append('id',id);
        formData.append('db',db);
        kuld("./kosarba.php",formData,"uzenet");
    }
}
function torol(){
    document.getElementById('uzenet').style.display = "none";
    document.getElementById('uzenet').style.visibility = "hidden";
    kuld("./torol.php", null, "uzenet");
}

function vissza(){
    window.history.back();
}

function cim_kitolt(){    
    var checkbox = document.getElementById('egyezocim').checked;
    if(checkbox == true) {
        var irszam = document.getElementById('1').value;
        var telepules = document.getElementById('2').value;
        var utca = document.getElementById('3').value;
        var hszam = document.getElementById('4').value;
        document.getElementById("cim2").value = irszam+", "+telepules+", "+utca+" "+hszam+".";
    }else{
        document.getElementById("cim2").value = "";
    }
    
}

function ellenorzes(mit,mivel,gomb) {
    var jelszo1 = document.getElementById(mit).value;
    var jelszo2 = document.getElementById(mivel).value;
    if ((jelszo1 != "") && (jelszo2 != "") && (jelszo1 == jelszo2)) {
        document.getElementById(gomb).disabled = false;
    } else {
        document.getElementById(gomb).disabled = true;
        alert('A két jelszó nem egyezik meg!')
    }
}