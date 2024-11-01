document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('financialChartCanvas').getContext('2d');

    // Extract x and y values from data pairs
    const xLabels = financialChartData.dataPairs.map(pair => pair.x); // x-axis labels
    const yValues = financialChartData.dataPairs.map(pair => pair.y); // y-axis data points


    new Chart(ctx, {
        type: financialChartData.chartType || 'line', // Default to 'line' if not specified
        data: {
            labels: xLabels,
            datasets: [{
                label: financialChartData.chartTitle,
                data: yValues,
                borderColor: financialChartData.chartColor,
                backgroundColor: financialChartData.chartColor + '33', // Slightly transparent
                fill: true,
                tension: 0.4 // Curved line
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: financialChartData.chartTitle
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'X-Axis Label'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Y-Axis Label'
                    },
                    beginAtZero: true
                }
            }
        }
    });
});