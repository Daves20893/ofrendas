
        function calcular(){
            try{
                var a = parseFloat(document.getElementById("diezmo").value) || 0,
                    b = parseFloat(document.getElementById("ofrenda").value) || 0,
                    c = parseFloat(document.getElementById("mision").value) || 0,
                    d = parseFloat(document.getElementById("protemplo").value) || 0,
                    f = parseFloat(document.getElementById("servicio").value) || 0,
                    g = parseFloat(document.getElementById("buena_dadiva").value) || 0;

                    var a2=a.toFixed(2);
                    var b2=b.toFixed(2);
                    var c2=c.toFixed(2);
                    var d2=d.toFixed(2);
                    var f2=f.toFixed(2);
                    var g2=g.toFixed(2);

                    document.getElementById("diezmo").value=a2;
                    document.getElementById("ofrenda").value=b2;
                    document.getElementById("mision").value=c2;
                    document.getElementById("protemplo").value=d2;
                    document.getElementById("servicio").value=f2;
                    document.getElementById("buena_dadiva").value=g2;

                var suma=a+b+c+d+f+g;
                var sum=suma.toFixed(2);
                    
                document.getElementById("total").value= sum;

                 /*var el = document.getElementById("diezmo")

                // te aseguras que el valor inicial tiene el formato correcto
                el.value = el.valueAsNumber.toFixed(2)

                // manejador que asegura que el valor tiene el formato correcto cuando 
                // se modifica el valor, ya sea manual o con los botones inc/dec
                el.addEventListener('diezmo', function(event) {
                event.target.value = event.target.valueAsNumber.toFixed(2)
                }); */


            }catch (e){}
        }

