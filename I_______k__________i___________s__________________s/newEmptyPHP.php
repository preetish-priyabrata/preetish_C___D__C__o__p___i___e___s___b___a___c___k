<html>
    <head>
        <script language="javascript">
                function Calc(className) {
                    var elements = document.getElementsByClassName(className);
                    var total = 0;

                    for (var i = 0; i < elements.length; ++i) {
                        total += parseInt(elements[i].value);
                    }

                    document.form0.total.value = total;
                }

                function addone(field) {
                    field.value = Number(field.value) + 1;
                }

                function subtractone(field) {
                    field.value = Number(field.value) - 1;
                }
        </script>

    </head>
    <body>
        <form name="form0" id="form0">

            1: <input type="text" name="box1" id="box1" class="add" value="0" onKeyUp="Calc('add')" onChange="updatesum()" onClick="this.focus();
            this.select();" />
            <input type="button" value=" + " onclick="addone(box1);">
            <input type="button" value=" - " onclick="subtractone(box1);">
            <br />

            2: <input type="text" name="box2" id="box2" class="add" value="0" onKeyUp="Calc('add')" onClick="this.focus();
            this.select();" />
            <input type="button" value=" + " onclick="addone(box2);">
            <input type="button" value=" - " onclick="subtractone(box2);">
            <br />

            3: <input type="text" name="box3" id="box3" class="add" value="0" onKeyUp="Calc('add')" onClick="this.focus();
            this.select();" />
            <input type="button" value=" + " onclick="addone(box3);">
            <input type="button" value=" - " onclick="subtractone(box3);">
            <br />

            <br />
            Total: <input readonly style="border:0px; font-size:14; color:red;" id="total" name="total">

        </form>
    </body></html>