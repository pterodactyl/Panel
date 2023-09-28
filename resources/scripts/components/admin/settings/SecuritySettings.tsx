import { Form, Formik, FormikHelpers } from 'formik';
import tw from 'twin.macro';

import AdminBox from '@/components/admin/AdminBox';
import Field, { FieldRow } from '@/components/elements/Field';
import SelectField from '@/components/elements/SelectField';
import { Context } from './SettingsRouter';

interface Values {
    recaptchaStatus: string;
    siteKey: string;
    secretKey: string;
    sfaRequired: string;
}

export default () => {
    const security = Context.useStoreState(state => state.settings!.security);
    const { enabled: recaptchaStatus, siteKey, secretKey } = security.recaptcha;

    const submit = (values: Values, { setSubmitting }: FormikHelpers<Values>) => {
        console.log(values);
        setSubmitting(false);
    };

    return (
        <Formik
            onSubmit={submit}
            initialValues={{
                recaptchaStatus: `${recaptchaStatus}`,
                siteKey,
                secretKey,
                sfaRequired: `${security['2faEnabled']}` ?? '0',
            }}
        >
            <Form>
                <div css={tw`grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6`}>
                    <AdminBox title="reCaptcha">
                        <FieldRow>
                            <SelectField
                                id={'recaptchaStatus'}
                                name={'recaptchaStatus'}
                                label={'Status'}
                                description={
                                    'If enabled, login forms and password reset forms will do a silent captcha check and display a visible captcha if needed.'
                                }
                                options={[
                                    { value: 'true', label: 'Enabled' },
                                    { value: 'false', label: 'Disabled' },
                                ]}
                            />
                        </FieldRow>
                        <FieldRow>
                            <Field id={'siteKey'} name={'siteKey'} type={'text'} label={'Site Key'} description={''} />

                            <Field
                                id={'secretKey'}
                                name={'secretKey'}
                                type={'password'}
                                label={'Secret Key'}
                                description={
                                    'Used for communication between your site and Google. Be sure to keep it a secret.'
                                }
                            />
                        </FieldRow>
                    </AdminBox>
                    <AdminBox title="Two Factor Authentication">
                        <FieldRow>
                            <SelectField
                                id={'sfaRequired'}
                                name={'sfaRequired'}
                                label={'Status'}
                                description={
                                    'If enabled, any account falling into the selected grouping will be required to have 2-Factor authentication enabled to use the Panel.'
                                }
                                options={[
                                    { value: '0', label: 'Not Required' },
                                    { value: '1', label: 'Admin Only' },
                                    { value: '2', label: 'All Users' },
                                ]}
                            />
                        </FieldRow>
                    </AdminBox>
                </div>
            </Form>
        </Formik>
    );
};
