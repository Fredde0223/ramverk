<?php

namespace Anax\View;

?><h1>IP-validering</h1>

<p><a href="api">IP-validering (API)</a></p>

<p>Detta är en validator för olika IP-adresser.</p>
<p>Ange adressen du vill kontrollera här:</p>

<form method="post">
    <input type="text" name="ipstring">
    <input type="submit" name="validate" value="Kör kontroll">
</form>

<?php if ($ipres && $domres) : ?>
    <p><?= $ipres ?></p>
    <p><?= $domres ?></p>
<?php endif; ?>
