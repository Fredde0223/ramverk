<?php

namespace Anax\View;

?><h1>IP-validering (API)</h1>

<p>Detta är en validator för olika IP-adresser med hjälp av ett API. Det första sättet att jobba med API:et är genom att en query-sträng ange en IP-adress. Detta ger en resopns i json-format.</p>

<p><a href="api/validate?ip=127.0.0.1">Exempel 1: /validate?ip=127.0.0.1</a></p>
<p><a href="api/validate?ip=0000:0000:0000:0000:0000:0000:0000:0001">Exempel 2: /validate?ip=0000:0000:0000:0000:0000:0000:0000:0001</a></p>
<p><a href="api/validate?ip=8.8.8.8">Exempel 3: /validate?ip=8.8.8.8</a></p>
<p><a href="api/validate?ip=1337.1337">Exempel 4: /validate?ip=1337.1337</a></p>

<p>Det andra sättet att jobba med API:et är att posta en IP-adress i formuläret nedan. Detta kommer att ge dig en json-respons precis som innan.</p>

<form action="api/validate" method="post">
    <input type="text" name="ipstring">
    <input type="submit" name="validate" value="Kör kontroll">
</form>
