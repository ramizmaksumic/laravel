<form action="/add-ocena" method="POST">
    @csrf
    <input type="text" name="predmet" placeholder="Dodaj novi predmet">
    <input type="number" name="ocena" placeholder="Dodaj ocjenu">
    <input type="text" name="profesor" placeholder="Dodaj novog profesora">

    <input type="submit" value="Dodaj predmet">
</form>

<a href="/">Vrati se na glavnu stranicu</a>