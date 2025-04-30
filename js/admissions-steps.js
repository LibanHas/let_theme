document.addEventListener('DOMContentLoaded', function () {
    const stepsData = {
        master: {
          april: [
            {
              number: '01',
              title: '研究室訪問・面談',
              period: '推奨時期：5〜6月',
              description: 'LET Labに訪問し、教員との面談を通じて研究内容や志望動機を整理しましょう。',
              icon: 'icon-visit.svg'
            },
            {
              number: '02',
              title: '出願（AO方式）',
              period: '出願時期：6月下旬',
              description: '必要書類を準備し、出願期間内にAO方式で出願を行います。',
              icon: 'icon-application.svg'
            },
            {
              number: '03',
              title: 'AO入試（面接）',
              period: '実施時期：8月上旬',
              description: '研究計画に基づいた面接試験が行われます（対面またはオンライン）。',
              icon: 'icon-interview.svg'
            },
            {
              number: '04',
              title: '入学',
              period: '入学時期：4月',
              description: '合格後、所定の手続きを経てLET Labでの研究生活がスタートします。',
              icon: 'icon-enrollment.svg'
            }
          ],
          october: [
            {
              number: '01',
              title: '研究室訪問・面談',
              period: '推奨時期：12月',
              description: '10月入学を希望する場合、前年の12月頃にLET Labを訪問し、教員と面談を行いましょう。',
              icon: 'icon-visit.svg'
            },
            {
              number: '02',
              title: '出願（AO方式）',
              period: '出願時期：1月（※国際志願者は4月も可）',
              description: '一般出願は1月ですが、国際志願者には4月締切の追加期間が設けられる場合があります。',
              icon: 'icon-application.svg'
            },
            {
              number: '03',
              title: 'AO入試（面接）',
              period: '実施時期：2月（※国際志願者は4〜5月も可）',
              description: '提出した研究計画に基づき、面接試験が行われます。国際志願者は後期日程の選択も可能です。',
              icon: 'icon-interview.svg'
            },
            {
              number: '04',
              title: '入学',
              period: '入学時期：10月',
              description: '入試に合格し、手続きが完了したら、10月よりLET Labでの研究が開始されます。',
              icon: 'icon-enrollment.svg'
            }
          ]
        },
        phd: {
          april: [
            {
              number: '01',
              title: '研究室訪問・面談',
              period: '推奨時期：5〜6月',
              description: 'LET Labに訪問し、教員との面談を通じて研究内容や志望動機を整理しましょう。',
              icon: 'icon-visit.svg'
            },
            {
              number: '02',
              title: '出願（AO方式）',
              period: '出願時期：6月下旬',
              description: '必要書類を準備し、出願期間内にAO方式で出願を行います。',
              icon: 'icon-application.svg'
            },
            {
              number: '03',
              title: 'AO入試（面接）',
              period: '実施時期：8月上旬',
              description: '研究計画に基づいた面接試験が行われます（対面またはオンライン）。',
              icon: 'icon-interview.svg'
            },
            {
              number: '04',
              title: '入学',
              period: '入学時期：4月',
              description: '合格後、所定の手続きを経てLET Labでの研究生活がスタートします。',
              icon: 'icon-enrollment.svg'
            }
          ],
          october: [
            {
              number: '01',
              title: '研究室訪問・面談',
              period: '推奨時期：12月',
              description: '10月入学を希望する場合、前年の12月頃にLET Labを訪問し、教員と面談を行いましょう。',
              icon: 'icon-visit.svg'
            },
            {
              number: '02',
              title: '出願（AO方式）',
              period: '出願時期：1月（※国際志願者は4月も可）',
              description: '一般出願は1月ですが、国際志願者には4月締切の追加期間が設けられる場合があります。',
              icon: 'icon-application.svg'
            },
            {
              number: '03',
              title: 'AO入試（面接）',
              period: '実施時期：2月（※国際志願者は4〜5月も可）',
              description: '提出した研究計画に基づき、面接試験が行われます。国際志願者は後期日程の選択も可能です。',
              icon: 'icon-interview.svg'
            },
            {
              number: '04',
              title: '入学',
              period: '入学時期：10月',
              description: '入試に合格し、手続きが完了したら、10月よりLET Labでの研究が開始されます。',
              icon: 'icon-enrollment.svg'
            }
          ]
        },
        research: {
          april: [
            {
              number: '01',
              title: '国費留学生面接・手続き',
              period: '実施時期：7月下旬〜8月上旬',
              description: 'MEXT（国費）による支援を希望する場合は、別途面接および関連手続きが必要です。',
              icon: 'icon-interview.svg'
            },
            {
              number: '02',
              title: '入学',
              period: '入学時期：4月',
              description: '手続き完了後、LET Labでの研究活動が開始されます。',
              icon: 'icon-enrollment.svg'
            }
          ],
          october: [
            {
              number: '01',
              title: '国費留学生面接・手続き',
              period: '実施時期：7月下旬〜8月上旬',
              description: 'MEXT（国費）による支援を希望する場合、面接および必要な手続きがこの時期に行われます。',
              icon: 'icon-interview.svg'
            },
            {
              number: '02',
              title: '入学',
              period: '入学時期：10月',
              description: '手続き完了後、10月からLET Labでの研究活動を開始します。',
              icon: 'icon-enrollment.svg'
            }
          ]
        }
      };
      
  
    const applicantType = document.getElementById('applicantType');
    const entryTerm = document.getElementById('entryTerm');
    const stepsContainer = document.getElementById('stepsContainer');
  
    function renderSteps() {
      const type = applicantType.value;
      const term = entryTerm.value;
      const steps = stepsData[type]?.[term] || [];
  
      stepsContainer.innerHTML = '';
  
      steps.forEach(step => {
        const stepEl = document.createElement('div');
        stepEl.className = 'step-box';
        stepEl.innerHTML = `
          <div class="step-left ${step.number === '06' ? 'highlight' : ''}">
            <div class="step-label">STEP</div>
            <div class="step-number">${step.number}</div>
            <div class="step-caret"></div>
          </div>
          <div class="step-right">
            <div class="step-meta">📌 ${step.period}</div>
            <div class="step-title-icon">
              <img src="/wp-content/themes/let_theme/images/icons/${step.icon}" alt="" class="step-icon">
              <h4>${step.title}</h4>
            </div>
            <p>${step.description}</p>
          </div>
        `;
        stepsContainer.appendChild(stepEl);
      });
    }
  
    applicantType.addEventListener('change', renderSteps);
    entryTerm.addEventListener('change', renderSteps);
  
    renderSteps(); // Initial load
  });
  