<!DOCTYPE html>
<html >
<!-- here startes the html file -->
<head> 
      <meta keywords="html5,learn,teach"/>
      <link rel="stylesheet" type="text/css" href="mystyle.css">
      <title> La page de la sortie </title>
   
</head>
<body background="autoroute.jpg" style=" background-size: 115% 660px;  background-repeat: no-repeat; opacity: 0.9 ";>
       <fieldset style=" Background-Color:#008080; width:30%; padding:20px; width:800px; margin:auto; opacity: 0.8" 	>
       
     <p > <h1> <center> Sortie de l'autouroute </center> </h1> </p>
	   </br>  </br> 

	   
		   <p >
			  <tr > 
			  	 <form action="recherche_ticket.php"  method="post">
			  	<td  style="width: 30%" > <b> vérification de l'existance du ticket par numéro : </b> </td> 
			  	<td> <input type="text"  id="numero" name="numero"></td>
			  	<td>  <input type="submit" id="sub" id="Envoyer" value="vérifier"> </td></br></br></br>
			  	 </form>
			  	  <form  action="modifier_ticket.php"  method="post">
			  	<td  style="width: 30%" > <b> Entrer la date de sortie : </b></td> 
   		        <td> <input type="datetime"  id="DateSortie" name="DateSortie"></td>
   		        	<td  style="width: 30%" > <b> Entrer le numéro de ticket : </b></td> 
   		      <td> <input type="text"  id="nb" name="nb"></td>
   		        <td> <input type="submit" id="sub" id="Envoyer" value="Envoyer"></td> </br></br>
   		        </form>
   		        <form action="paiement_ticket.php"  method="post">
   		        <td  style="color:#660000"; > <b> paiement de ticket, </b> </td> 
   		         <td  style="width: 30%" > <b> entrer le numéro de ticket : </b></td> 
   		      <td> <input type="text"  id="nbr" name="nbr"></td>
   		        <td> <input type="submit" id="sub" id="Envoyer" value="paiement"></td>
   		       
   		    </form>
   		      </tr>
  </fieldset>
   		           </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
   		 </p>
   		 	   
        </div>
</body>
<!-- here ends the html file -->
</html>