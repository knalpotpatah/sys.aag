// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Tikus", "Kecoa Jerman", "Kecoa Amerika","Lalat Limbah","Lalat Buah", "Lalat Rumah","Nyamuk","Semut","Mothid","Beetleid"],
    datasets: [{
      data: [55, 30, 15, 20, 37, 40, 17, 10 ,12 ,11], 
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#c9ff05','#ff0526','#0905ff','#ff5405','#ff0582','#007a25','#000000'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
