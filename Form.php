
<html>
<body>

<form action="welcome.php" method="POST">

First Name: <input type="text" name="fname"  oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" required><br>
Middle Name: <input type="text" name="mname"  oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" required><br>
Last Name: <input type="text" name="lname"  oninput="this.value = this.value.replace(/[^A-Za-z.]/g, '').replace(/(\..*)\./g, '$1');" required><br>

E-mail: <input type="email" name="email" required ><br>
Mobile: <input type="number" name="number"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required><br>
<h1 name="errorMsg"></h1>
<input type="submit">
</form>

</body>
</html>