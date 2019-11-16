import {Doughnut} from 'vue-chartjs'

export default Doughnut.extend({
  mounted () {
    this.renderChart({
      labels: ['#coworking', '#tunisia', '#el', '#designthinking'],
      datasets: [
        {
          backgroundColor: [
            '#41B883',
            '#E46651',
            '#00D8FF',
            '#DD1B16'
          ],
          data: [23, 15, 25, 17]
        }
      ]
    }, {responsive: true, maintainAspectRatio: false})
  }
})