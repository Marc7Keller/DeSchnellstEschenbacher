function enableLoadButton()
{
	if(document.getElementsByName("vorname")[0].value == "" || document.getElementsByName("nachname")[0].value == "")
	{
		document.getElementById("laden_button").disabled = true;
	}
	else
	{
		document.getElementById("laden_button").disabled = false;
	}
}

function enableSubmitButton()
{
	if(document.getElementsByName("gebdatum")[0].value == "" || document.getElementsByName("ort")[0].value == "")
	{
		document.getElementById("speichern_button").disabled = true;
	}
	else
	{
		document.getElementById("speichern_button").disabled = false;
	}
}

function enableSubmitButtonEdit()
{
	if(document.getElementsByName("vorname")[0].value == "" || document.getElementsByName("nachname")[0].value == "" || document.getElementsByName("ort")[0].value == "" || document.getElementsByName("gebdatum")[0].value == "")
	{
		document.getElementById("speichern_button").disabled = true;
	}
	else
	{
		document.getElementById("speichern_button").disabled = false;
	}
}

function colorEmptyField1()
{
	if(document.getElementsByName("nachname")[0].value == "")
	{
		document.getElementById("nachname").style.borderColor = "red";
	}
	else
	{
		document.getElementById("nachname").style.borderColor = "";
	}
}

function colorEmptyField2()
{
	if(document.getElementsByName("vorname")[0].value == "")
	{
		document.getElementById("vorname").style.borderColor = "red";
	}
	else
	{
		document.getElementById("vorname").style.borderColor = "";
	}
}

function colorEmptyField3()
{
	if(document.getElementsByName("gebdatum")[0].value == "")
	{
		document.getElementById("gebdatum").style.borderColor = "red";
	}
	else
	{
		document.getElementById("gebdatum").style.borderColor = "";
	}
}

function colorEmptyField4()
{
	if(document.getElementsByName("ort")[0].value == "")
	{
		document.getElementById("ort").style.borderColor = "red";
	}
	else
	{
		document.getElementById("ort").style.borderColor = "";
	}
}

function colorEmptyField5()
{
	if(document.getElementsByName("vorname")[0].value == "")
	{
		document.getElementById("vorname2").style.borderColor = "red";
	}
	else
	{
		document.getElementById("vorname2").style.borderColor = "";
	}
}

function colorEmptyField6()
{
	if(document.getElementsByName("nachname")[0].value == "")
	{
		document.getElementById("nachname2").style.borderColor = "red";
	}
	else
	{
		document.getElementById("nachname2").style.borderColor = "";
	}
}

function colorEmptyField7()
{
	if(document.getElementsByName("ort")[0].value == "")
	{
		document.getElementById("ort2").style.borderColor = "red";
	}
	else
	{
		document.getElementById("ort2").style.borderColor = "";
	}
}

function colorEmptyField8()
{
	if(document.getElementsByName("gebdatum")[0].value == "")
	{
		document.getElementById("gebdatum2").style.borderColor = "red";
	}
	else
	{
		document.getElementById("gebdatum2").style.borderColor = "";
	}
}


function setFocus()
{
	document.getElementById("nachname").focus();
}
