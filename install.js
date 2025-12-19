#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const readline = require('readline');

const CONFIG_FILE = 'rename.conf.json';

const oldValues = {
    name: 'Cloudusk Boilerplate',
    namespace: 'ClouduskBoilerplate',
    author: 'Cloudusk'
};

const fileExtensions = ['.php', '.json', '.yaml', '.tsx'];
const hasYesFlag = process.argv.includes('--yes');

function ask(question, defaultValue) {
    return new Promise(resolve => {
        const rl = readline.createInterface({ input: process.stdin, output: process.stdout });
        rl.question(`${question} [${defaultValue}]: `, answer => {
            rl.close();
            resolve(answer.trim() || defaultValue);
        });
    });
}

function loadConfig() {
    if (fs.existsSync(CONFIG_FILE)) {
        try {
            return JSON.parse(fs.readFileSync(CONFIG_FILE, 'utf8'));
        } catch (err) {
            console.warn(`⚠️ Error parsing ${CONFIG_FILE}, using defaults.`);
        }
    }
    return {};
}

function getAllFilesRecursive(dir) {
    const entries = fs.readdirSync(dir, { withFileTypes: true });
    const files = [];
    for (const entry of entries) {
        const fullPath = path.join(dir, entry.name);
        if (entry.isDirectory()) {
            files.push(...getAllFilesRecursive(fullPath));
        } else {
            files.push(fullPath);
        }
    }
    return files;
}

function isTextFile(filePath) {
    try {
        const buffer = fs.readFileSync(filePath);
        return buffer.toString('utf8').length === buffer.length;
    } catch {
        return false;
    }
}

function handleDockerFiles(file, oldValues, newValues) {
    const dockerFile = fs.readFileSync(file, 'utf8');
    const newDockerFile = dockerFile
        .replaceAll(
            oldValues.name.replaceAll(' ', '-').toLowerCase(),
            newValues.name.replaceAll(' ', '-').toLowerCase()
        );

    if (dockerFile !== newDockerFile) {
        fs.writeFileSync(file, newDockerFile);

    }
}

async function main() {
    const config = loadConfig();

    console.log(`🛠️  WordPress Plugin Boilerplate Renamer\n`);
    let newValues = {}
    if (hasYesFlag) {
        console.log('🔄 Using default values without prompts due to --yes flag.');
        newValues = {
            name: config.name || oldValues.name,
            namespace: config.namespace || oldValues.namespace,
            author: config.author || oldValues.author
        };
    }
    else {
        newValues = {
            name: await ask('Enter new plugin name', config.name || 'Cloudusk Boilerplate'),
            namespace: await ask('Enter new PHP namespace', config.namespace || 'ClouduskBoilerplate'),
            author: await ask('Enter author name', 'Umair Bussi'),

        };
    }




    console.log('\n🔍 Replacing content in files...\n');

    const files = getAllFilesRecursive(process.cwd());

    files.forEach(file => {
        const ext = path.extname(file);
        if (!fileExtensions.includes(ext) || !isTextFile(file)) return;

        let content = fs.readFileSync(file, 'utf8');
        const newContent = content
            .replaceAll(new RegExp(oldValues.name, 'gi'), newValues.name)
            .replaceAll(new RegExp(oldValues.namespace, 'gi'), newValues.namespace)
            .replaceAll(new RegExp(oldValues.author, 'gi'), newValues.author)


        if (content !== newContent) {
            fs.writeFileSync(file, newContent);

        }
    });

    handleDockerFiles('Dockerfile', oldValues, newValues);
    handleDockerFiles('compose.yaml', oldValues, newValues);


    const cwd = process.cwd();
    const oldDir = cwd + '/plugins/' + oldValues.name.replaceAll(' ', '-').toLowerCase();
    const newDir = cwd + '/plugins/' + newValues.name.replaceAll(' ', '-').toLowerCase();

    fs.renameSync(oldDir, newDir);

    console.log('\n🎉 All done!');
}

main();
