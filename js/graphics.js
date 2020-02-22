function draw() {
    var canvas = document.getElementById('canvas');
    if (canvas.getContext) {
        var ctx = canvas.getContext('2d');

        // Quadratric curves example
        ctx.beginPath();
        ctx.moveTo(75, 40);
        ctx.bezierCurveTo(75, 37, 70, 25, 50, 25);
        ctx.bezierCurveTo(20, 25, 20, 62.5, 20, 62.5);
        ctx.bezierCurveTo(20, 80, 40, 102, 75, 120);
        ctx.bezierCurveTo(110, 102, 130, 80, 130, 62.5);
        ctx.bezierCurveTo(130, 62.5, 130, 25, 100, 25);
        ctx.bezierCurveTo(85, 25, 75, 37, 75, 40);
        ctx.fill();
    }
}
draw();

function buildHistogram() {
    var data = [
        {
            x: ['0', '5', '10', '20', '30', '40', '100', '200'],
            y: [1000, 800, 574, 231, 142, 58, 1, 0],
            type: 'bar'
        }
    ];
    var layout = {
        title: "Залежність кількості крадіжок від товщини тросу, <br>яким прикріплено велосипед",
        xaxis: {
            type: "log",
            title: {
                text: 'К-сть крадіжок',
                font: {
                    size: 14
                }
            },
        },
        yaxis: {

            title: {
                text: 'Товщина (мм)',
                font: {
                    size: 14
                }
            },
        }
    };
    var config = { responsive: true,
        displaylogo: false };
    Plotly.newPlot('myDiv', data, layout, config);
}
buildHistogram();