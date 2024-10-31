<?php
/**
 * Medazin
 * Customizer Control: Medazin Radio Image control
 */
 if ( ! class_exists( 'Medazin_Customize_Base_Control' ) ) {
	return;
}

class Medazin_Customize_Control_Radio_Image extends Medazin_Customize_Base_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @since 1.0.0
	 * @var   string
	 */
	public $type = 'medazin-radio-image';
	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {
		/* If no choices are provided, bail. */
		if ( empty( $this->choices ) ) {
			return;
		} ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif; ?>

		<div id="<?php echo esc_attr( "input_{$this->id}" ); ?>" class="medazin-radio-image-select">

			<?php foreach ( $this->choices as $value => $args ) : ?>

				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />

				<label for="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>">
					<?php if ( ! empty( $args['label'] ) ) { ?>
						<span class="screen-reader-text"><?php echo esc_html( $args['label'] ); ?></span>
						<?php
}
?>
					<img src="<?php echo esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) ); ?>" 
						<?php
						if ( ! empty( $args['label'] ) ) {
							echo 'alt="' . esc_attr( $args['label'] ) . '"'; }
?>
	/>
				</label>

			<?php endforeach; ?>

		</div><!-- .image -->

	<?php
	}
}
