import * as yup from 'yup'


export const contactFormValidationSchema = yup.object({
    name: yup.string().required(),
    email: yup.string().email().required(),
    subject: yup.string().required('Subject field is required'),
    message: yup.string().required('Message field is required')
});
