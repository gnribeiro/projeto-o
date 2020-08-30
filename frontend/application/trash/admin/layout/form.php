<form action="/home/form/" method="post" name="contact_form" enctype="multipart/form-data">
<label for="name">Nome:</label> <br />

<input type="text" name="name" /> <br />
<input type="file" name="imageup1" id="file_uploader" size="80" />
<br />

<input type="submit" name="new_insignie" value="submit" />

</form>

<? echo(isset($img))? HTML::image($img) : ''?>
