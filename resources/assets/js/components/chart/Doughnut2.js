import {Doughnut} from 'vue-chartjs'

export default Doughnut.extend({
  mounted () {
    this.renderChart({
      labels: ['ElSpace', 'Cojite', 'OpenFab',],
      datasets: [
        {
          backgroundColor: [
            '#41B883',
            '#E46651',
            '#00D8FF',
            '#DD1B16'
          ],
          data: [206, 3439, 161]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }
})