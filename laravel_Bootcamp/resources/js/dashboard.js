
const CyberTheme = {
    cyan: 'rgba(6, 182, 212, 1)',
    purple: 'rgba(168, 85, 247, 1)',
    pink: 'rgba(236, 72, 153, 0.8)',
    darkText: '#9ca3af'
};


window.initSalesChart = function(canvasId, labels, revenue, qty) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const revGradient = ctx.createLinearGradient(0, 0, 0, 400);
    revGradient.addColorStop(0, 'rgba(6, 182, 212, 0.4)');
    revGradient.addColorStop(1, 'rgba(6, 182, 212, 0)');

    return new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Pendapatan (IDR)',
                data: revenue,
                borderColor: CyberTheme.cyan,
                backgroundColor: revGradient,
                fill: true,
                tension: 0.4,
                yAxisID: 'yRev',
            },
            {
                label: 'Produk Terjual (Unit)',
                data: qty,
                borderColor: CyberTheme.purple,
                borderDash: [5, 5],
                backgroundColor: 'transparent',
                fill: false,
                tension: 0.4,
                yAxisID: 'yQty',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yRev: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    beginAtZero: true,
                    grid: { color: 'rgba(255, 255, 255, 0.05)' },
                    ticks: {
                        color: CyberTheme.cyan,
                        callback: value => 'Rp ' + value.toLocaleString()
                    }
                },
                yQty: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    beginAtZero: true,
                    grid: { drawOnChartArea: false },
                    ticks: { color: CyberTheme.purple, stepSize: 1 }
                },
                x: { ticks: { color: CyberTheme.darkText } }
            },
            plugins: {
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: (context) => {
                            let label = context.dataset.label || '';
                            let val = context.parsed.y;
                            return label.includes('IDR') ? `${label}: Rp ${val.toLocaleString()}` : `${label}: ${val} Unit`;
                        }
                    }
                }
            }
        }
    });
};


window.initStockPieChart = function(canvasId, labels, data) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    return new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    CyberTheme.cyan,
                    CyberTheme.purple,
                    CyberTheme.pink,
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(34, 211, 238, 0.8)'
                ],
                borderWidth: 2,
                borderColor: '#111827',
                hoverOffset: 20
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: CyberTheme.darkText, padding: 20, usePointStyle: true, font: { size: 10 } }
                }
            }
        }
    });
};