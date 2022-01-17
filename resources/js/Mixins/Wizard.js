export default {
	computed: {
		wizard() {
			return this.$page.props.arcanist.wizard;
		},

		step() {
			return this.$page.props.arcanist.step;
		},

		url() {
			return window.location.href;
		}
	}
}