<script>
import { HorizontalBar, mixins } from 'vue-chartjs'

export default {
    extends: HorizontalBar,
    mixins: [mixins.reactiveProp],
    data() {
        return {
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }
    },
    // watch: {
    //     chartData () {
    //         this.$data._chart.update()
    //     }
    // },
    mounted () {
        this.renderChart(this.chartData, this.options)
    }
}
</script>
