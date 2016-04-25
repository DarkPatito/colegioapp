var Data = {
    labels : [],
    datasets : [
        {   label :"Promedio SIMCE",
            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
            data : []
        }
    ]
}

function actualizarChart() {

}

window.onload = function() {
    cargarDB();
    var ctx = document.getElementById("myChart").getContext("2d");

    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: Data,
        options: {
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each bar to be 2px wide and green

            responsive: false,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Mayor a menor puntaje SIMCE'
            }
        }
    });

};