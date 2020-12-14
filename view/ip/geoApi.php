<?php

namespace Anax\View;

?><h1>En IP-adress geografiska position (API)</h1>

<p>Detta är ett sätt att lokalisera olika IP-adresser med hjälp av ett API. Det första sättet att jobba med API:et är genom att en query-sträng ange en IP-adress. Detta ger en respons i json-format.</p>

<p><a href="geoapi/locate?ip=1.2.3.4">Exempel 3: /locate?ip=1.2.3.4</a></p>
<p><a href="geoapi/locate?ip=8.8.8.8">Exempel 3: /locate?ip=8.8.8.8</a></p>
<p><a href="geoapi/locate?ip=1337.1337">Exempel 4: /locate?ip=1337.1337</a></p>

<p>Det andra sättet att jobba med API:et är att posta en IP-adress i formuläret nedan. Detta kommer att ge dig en json-respons precis som innan.</p>

<form action="geoapi/locate" method="post">
    <input type="text" name="ipstring" value="<?= $userip ?>">
    <input type="submit" name="locate" value="Kör sökning">
</form>
