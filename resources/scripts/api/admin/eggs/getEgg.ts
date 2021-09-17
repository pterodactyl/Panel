import { Nest } from '@/api/admin/nests/getNests';
import { rawDataToServer, Server } from '@/api/admin/servers/getServers';
import http, { FractalResponseData, FractalResponseList } from '@/api/http';

export interface EggVariable {
    id: number;
    eggId: number;
    name: string;
    description: string;
    envVariable: string;
    defaultValue: string;
    userViewable: boolean;
    userEditable: boolean;
    rules: string;
    required: boolean;
    createdAt: Date;
    updatedAt: Date;
}

const rawDataToEggVariable = ({ attributes }: FractalResponseData): EggVariable => ({
    id: attributes.id,
    eggId: attributes.egg_id,
    name: attributes.name,
    description: attributes.description,
    envVariable: attributes.env_variable,
    defaultValue: attributes.default_value,
    userViewable: attributes.user_viewable,
    userEditable: attributes.user_editable,
    rules: attributes.rules,
    required: attributes.required,
    createdAt: new Date(attributes.created_at),
    updatedAt: new Date(attributes.updated_at),
});

export interface Egg {
    id: number;
    uuid: string;
    nestId: number;
    author: string;
    name: string;
    description: string | null;
    features: string[] | null;
    dockerImages: string[];
    configFiles: Record<string, any> | null;
    configStartup: Record<string, any> | null;
    configStop: string | null;
    configFrom: number | null;
    startup: string;
    scriptContainer: string;
    copyScriptFrom: number | null;
    scriptEntry: string;
    scriptIsPrivileged: boolean;
    scriptInstall: string | null;
    createdAt: Date;
    updatedAt: Date;

    relations: {
        nest?: Nest;
        servers?: Server[];
        variables?: EggVariable[];
    };
}

export const rawDataToEgg = ({ attributes }: FractalResponseData): Egg => ({
    id: attributes.id,
    uuid: attributes.uuid,
    nestId: attributes.nest_id,
    author: attributes.author,
    name: attributes.name,
    description: attributes.description,
    features: attributes.features,
    dockerImages: attributes.docker_images,
    configFiles: attributes.config?.files,
    configStartup: attributes.config?.startup,
    configStop: attributes.config?.stop,
    configFrom: attributes.config?.extends,
    startup: attributes.startup,
    copyScriptFrom: attributes.copy_script_from,
    scriptContainer: attributes.script?.container,
    scriptEntry: attributes.script?.entry,
    scriptIsPrivileged: attributes.script?.privileged,
    scriptInstall: attributes.script?.install,
    createdAt: new Date(attributes.created_at),
    updatedAt: new Date(attributes.updated_at),

    relations: {
        nest: undefined,
        servers: ((attributes.relationships?.servers as FractalResponseList | undefined)?.data || []).map(rawDataToServer),
        variables: ((attributes.relationships?.variables as FractalResponseList | undefined)?.data || []).map(rawDataToEggVariable),
    },
});

export default (id: number, include: string[] = []): Promise<Egg> => {
    return new Promise((resolve, reject) => {
        http.get(`/api/application/eggs/${id}`, { params: { include: include.join(',') } })
            .then(({ data }) => resolve(rawDataToEgg(data)))
            .catch(reject);
    });
};
