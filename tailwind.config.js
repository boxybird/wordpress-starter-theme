module.exports = {
  theme: {
    extend: {}
  },
  variants: {},
  plugins: [
    // Third-party

    // Custom
    function ({ addUtilities, theme }) {
      const richText = {
        '.rich-text': {
          'h1': {
            fontSize: theme('fontSize.2xl'),
            marginBottom: theme('spacing.2'),
          },
          'h2': {
            fontSize: theme('fontSize.xl'),
            marginBottom: theme('spacing.2'),
          },
          'h3, h4, h5, h6': {
            fontSize: theme('fontSize.lg'),
            marginBottom: theme('spacing.2'),
          },
          'p': {
            textAlign: 'justify',
            fontSize: theme('fontSize.sm'),
            marginBottom: theme('spacing.4'),
            fontFamily: `${theme('fontFamily.body.0')}, theme('fontFamily.body.1')`,
          },
          'img': {
            borderRadius: theme('borderRadius.sm'),
          },
          'ol, ul': {
            margin: `0 0 ${theme('spacing.4')} ${theme('spacing.4')}`
          },
          'pre': {
            padding: theme('spacing.4'),
            marginBottom: theme('spacing.4'),
            borderRadius: theme('borderRadius.sm'),
            backgroundColor: theme('colors.gray.900')
          },
          'code': {
            color: theme('colors.gray.300'),
            backgroundColor: theme('colors.gray.900')
          },
          'blockquote': {
            marginBottom: theme('spacing.4'),
            borderColor: theme('colors.gray.300'),
            borderLeftWidth: theme('borderWidth.4'),
            padding: `${theme('spacing.2')} 0 ${theme('spacing.2')} ${theme('spacing.4')}`,
          },
          'blockquote p': {
            marginBottom: theme('spacing.2'),
          }
        }
      }

      addUtilities(richText)
    }
  ]
}
