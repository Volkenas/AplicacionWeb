<?php
session_start();
require_once "conexion.php";

if(isset($_POST['update']))
{
	@import_request_variables("GPC");

	$trayecto = explode("-",$trayecto);
	list($trayecto,$id_registro)=$trayecto;

	$updatereg = mysql_query("SELECT * FROM notas WHERE id_persona =".$id_registro);

	if(! $row = mysql_fetch_assoc($updatereg))
	{
		if($trayecto == "Inicial")
		{
			$newreg = mysql_query("INSERT INTO notas (id_persona, pnync, talleri, matini, ccys) VALUES ('$id_registro','$pnync','$talleri','$matini','$ccys')");
		}
		elseif($trayecto == "I")
			{
				$newreg = mysql_query("INSERT INTO notas (id_persona, tutopro1, costdocu, matematica, fisicaapli, topografia, egdp, eode, mecanica, geohabitad, quimicagene) VALUES ('$id_registro','$tutopro1','$costdocu','$matematica','$fisicaapli','$topografia','$egdp','$eode','$mecanica','$geohabitad','$quimicagene')");
			}
			elseif($trayecto == "II")
				{
					$newreg = mysql_query("INSERT INTO notas (id_persona, tutop2, hsi, gos, matecons, mecasuel, mecaflu, iac, admiobras, tecnoconst, obrasviales, instsangas, desaproeti, resismate, electmeca, sistehidro) VALUES ('$id_registro','$tutop2','$hsi','$gos','$matecons','$macasuel','$mecaflu','$iac','$admiobras','$tecnoconst','$obrasviales','$instsangas','$desaproeti','$resismate','$electmeca','$sistehidro')");
				}
				elseif($trayecto == "III")
					{
						$newreg = mysql_query("INSERT INTO notas (id_persona, tutop3, desaendoconst, algebralineal, restmatering, geologiaapli, mecafluing, orgconveing, mateing, analiestruc, disenovial, hidrologia, polihabiviv, ecogerpro, concretarmad, acueclodre, unidadacre3) VALUES ('$id_registro','$tutop3','$desaendoconst','$algebralineal','$restmatering','$geologiaapli','$mecafluing','$orgconveing','$mateing','$analiestruc','$disenovial','$hidrologia','$polihabiviv','$ecogerpro','$concretarmad','$acueclodre','$unidadacre3')");
					}
					elseif($trayecto == "IV")
						{
							$newreg = mysql_query("INSERT INTO notas (id_persona, tutop4, ingpatri, urbedi, aceromadera, ingtransit, saneaconsambi, geresoci, manteobrascivi, disenoestruct, pavimentos, obrashidrau, fundamuros, obrasistrans, unidaacre4, evalambi) VALUES ('$id_registro','$tutop4','$ingpatri','$urbedi','$aceromadera','$ingtransit','$saneaconsambi','$geresoci','$manteobrascivi','$disenoestruct','$pavimentos','$obrashidrau','$fundamuros','$obrasistrans','$unidaacre4','$evalambi')");
						}
		echo "<script type='text/javascript'>";
		echo "alert('Los Datos han sido Actualizados Satisfactoriamente');";
		echo "window.location='../main.php'";
		echo "</script>";

	}
	else
	{
		if($trayecto == "Inicial")
		{
			$updatereg = mysql_query("UPDATE notas SET pnync = '$pnync', talleri = '$talleri', matini = '$matini', ccys = '$ccys' WHERE id_persona =".$id_registro);
		}
		elseif($trayecto == "I")
			{
				$updatereg = mysql_query("UPDATE notas SET tutopro1 = '$tutopro1', costdocu = '$costdocu', matematica = '$matematica', fisicaapli = '$fisicaapli', topografia = '$topografia', egdp = '$egdp', eode = '$eode', mecanica = '$mecanica', geohabitad = '$geohabitad', quimicagene = '$quimicagene' WHERE id_persona =".$id_registro);
			}
			elseif($trayecto == "II")
				{
					$updatereg = mysql_query("UPDATE notas SET tutop2 = '$tutop2', hsi = '$hsi', gos = '$gos', matecons = '$matecons', mecasuel = '$mecasuel', mecaflu = '$mecaflu', iac = '$iac', admiobras = '$admiobras', tecnoconst = '$tecnoconst', obrasviales = '$obrasviales', instsangas = '$instsangas', desaproeti = '$desaproeti', resismate = '$resismate', electmeca = '$electmeca', sistehidro = '$sistehidro' WHERE id_persona =".$id_registro);
				}
				elseif($trayecto == "III")
					{
						$updatereg = mysql_query("UPDATE notas SET tutop3 = '$tutop3', desaendoconst = '$desaendoconst', algebralineal = '$algebralineal', restmatering = '$restmatering', geologiaapli = '$geologiaapli', mecafluing = '$mecafluing', orgconveing = '$orgconveing', mateing = '$mateing', analiestruc = '$analiestruc', disenovial = '$disenovial', hidrologia = '$hidrologia', polihabiviv = '$polihabiviv', ecogerpro = '$ecogerpro', concretarmad = '$concretarmad', acueclodre = '$acueclodre', unidadacre3 = '$unidadacre3' WHERE id_persona = ".$id_registro);
					}
					elseif($trayecto == "IV")
						{
							$updatereg = mysql_query("UPDATE notas SET tutop4 = '$tutop4', ingpatri = '$ingpatri', urbedi = '$urbedi', aceromadera = '$aceromadera', ingtransit = '$ingtransit', saneaconsambi = '$saneaconsambi', geresoci = '$geresoci', manteobrascivi = '$manteobrascivi', disenoestruct = '$disenoestruct', pavimentos = '$pavimentos', obrashidrau = '$obrashidrau', fundamuros = '$fundamuros', obrasistrans = '$obrasistrans', unidaacre4 = '$unidaacre4', evalambi = '$evalambi' WHERE id_persona = ".$id_registro);
						}
		echo "<script type='text/javascript'>";
		echo "alert('Los Datos han sido Actualizados Satisfactoriamente');";
		echo "window.location='../index.php'";
		echo "</script>";
	}

}
else
{
	header("Location: ../main.php");
}


?>