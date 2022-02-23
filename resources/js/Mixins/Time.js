export default {
	methods: {
		ratingTime(rating, component, type) {
			if (component == 'submission') {
				if (type == 'begin') {
					return new Date(rating.submission_begin_time_at);
				} else if (type == 'end') {
					return new Date(rating.submission_end_time_at);
				} else {
					return new Date();
				}
			} else if (component == 'verification') {
				if (type == 'begin') {
					return new Date(rating.verification_begin_time_at);
				} else if (type == 'end') {
					return new Date(rating.verification_end_time_at);
				} else {
					return new Date();
				}
			} else {
				return new Date();
			}
		}
	},
	computed: {
		currentTime() {
			return new Date();
		},
	}
}