<?php
// Fetch ACF fields
$chart_title = get_field('chart_title');
$chart_type = get_field('chart_type');
$x_label_name = get_field('x_label_name');
$x_data_values = get_field('x_data_values');
$y_label_name = get_field('y_label_name');
$y_data_values = get_field('y_data_values');
$chart_colors = get_field('chart_colors');

// Prepare data for the chart
$x_values = array_column($x_data_values, 'x_value');
$y_values = array_column($y_data_values, 'y_value');

// Render the chart
?>
<div class="financial-chart">
    <h2><?php echo esc_html($chart_title); ?></h2>
    
    <canvas id="financialChart"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('financialChart').getContext('2d');
            new Chart(ctx, {
                type: '<?php echo esc_js($chart_type); ?>',
                data: {
                    labels: <?php echo json_encode($x_values); ?>,
                    datasets: [{
                        label: '<?php echo esc_js($y_label_name); ?>',
                        data: <?php echo json_encode($y_values); ?>,
                        backgroundColor: '<?php echo esc_js($chart_colors); ?>',
                        borderColor: '<?php echo esc_js($chart_colors); ?>',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
