<?php

namespace Anax\View;

?><h1>En IP-adress geografiska position</h1>

<p><a href="geoapi">En IP-adress geografiska position (API)</a></p>

<p>Detta är en tjänst för att hitta olika IP-adressers geografiska positioner.</p>
<p>Ange IP-adressen du vill söka efter här:</p>

<form method="post">
    <input type="text" name="ipstring" value="<?= $userip ?>">
    <input type="submit" name="locate" value="Kör sökning">
</form>

<?php if ($ipres && $coordres && $locres) : ?>
    <p><?= $ipres ?></p>
    <p><?= $coordres ?></p>
    <p><?= $locres ?></p>
<?php endif; ?>
