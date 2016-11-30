<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GameXplorer | Add Game</title>

<link href="Style/Style.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<style>

	form hr{margin-top:80px;
        border:none;
        height:2px;
        background:#ccc;
    }
form p{

font-weight:500;
font-size:12px;
    padding:10px 15px;
    background:#bbb;
    border-radius: 20px;
    margin:-18px 400px;
    color:#555;
}

form span{
color:gray;
	
}

form input[type='file']{
margin:20px 0;	

}

form label i{
margin:0px ;
color:#FFF;

}
</style>
</head>

<body bgcolor="#dfdfdf">
<div class="header1">

    <a href="#" style="border:none;">Top Publishers </a> <a href="Browse.php">Browse Games </a> <a
        href="HomePage.php">Home </a>
</div>



<form action="GameReg_Script.php" class="material" method="post" enctype="multipart/form-data">
    <hr>
<p align="center">GENERAL INFO</p><br><br><br>
<input type="text" name="ugid" placeholder="ID"/>
<input type="text" name="name" placeholder="Name"/>
<input type="text" name="rlsdt" placeholder="Release Year"/>
<input type="text" name="rate" placeholder="Rating"/>
<input type="text" name="pub" placeholder="Publisher"/>
<input type="text" name="dev" placeholder="Developer"/>
    <textarea cols="50" name="synop" placeholder="Synopsis" style="width:912px;height:200px;resize: none"></textarea>

    <hr><p align="center">GENRE</p><br><br><br>

<input type="text" name="gnr1" placeholder="Genre1"/>
<input type="text" name="gnr2" placeholder="Genre2"/>
<input type="text" name="gnr3" placeholder="Genre3"/>

    <hr><p align="center">PLATFORM</p><br><br><br>

<input type="text" name="pl1" placeholder="Platform1"/>
<input type="text" name="pl2" placeholder="Platform2"/>
<input type="text" name="pl3" placeholder="Patform3"/>

    <hr><p align="center">MINIMUM</p><br><br><br>

<input type="text" name="m_os" placeholder="OS"/>
<input type="text" name="m_cpu" placeholder="CPU"/>
<input type="text" name="m_ram" placeholder="RAM"/>
<input type="text" name="m_gpu" placeholder="GPU"/>

    <hr><p align="center">RECOMMENDED</p><br><br><br>

<input type="text" name="r_os" placeholder="OS"/>
<input type="text" name="r_cpu" placeholder="CPU"/>
<input type="text" name="r_ram" placeholder="RAM"/>
<input type="text" name="r_gpu" placeholder="GPU"/>

    <hr><p align="center">TORRENT LINK</p><br><br><br>

    <input type="text" name="tr_lnk" placeholder="Paste URL" style="width:912px;"/>

    <hr><p align="center">TRAILER LINK</p><br><br><br>

    <input type="text" name="trail_lnk" placeholder="Paste URL" style="width:912px;"/>


    <hr><p align="center">PHOTOS</p><br><br><br>


<input type="file" id="pstr" name="image[]" />
<label for="pstr"><i class="fa fa-camera" aria-hidden="true"></i> Choose a file</label>


<input type="file" id="covr" name="image[]"/>
    <label for="pstr"><i class="fa fa-camera" aria-hidden="true"></i> Choose a file</label>

<input type="file" id="ss1" name="image[]" />
    <label for="pstr"><i class="fa fa-camera" aria-hidden="true"></i> Choose a file</label>

<input type="file" id="ss2" name="image[]"/>
    <label for="pstr"><i class="fa fa-camera" aria-hidden="true"></i> Choose a file</label>

<input type="file" id="ss3" name="image[]"/>
    <label for="pstr"><i class="fa fa-camera" aria-hidden="true"></i> Choose a file</label>

<input type="submit" value="Save" id="upload"/>

</form>
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<script type="text/javascript">

    var inputs = document.querySelectorAll( '.material input[type="file"]' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });

</script>


</body>
</html>