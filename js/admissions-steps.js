document.addEventListener('DOMContentLoaded', function () {
  // Detect language from <html lang="en"> or fallback to Japanese
  const lang = document.documentElement.lang.startsWith('en') ? 'en' : 'ja';

  const stepsData = {
    ja: {
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
    },
    en: {
      master: {
        april: [
          {
            number: '01',
            title: 'Lab Visit and Interview',
            period: 'Recommended: May–June',
            description: 'Visit LET Lab and discuss your research interests and motivation with faculty members.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application (AO Method)',
            period: 'Application: Late June',
            description: 'Prepare the required documents and submit your application during the AO application period.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'AO Entrance Exam (Interview)',
            period: 'Exam: Early August',
            description: 'An interview based on your research plan will be conducted (in-person or online).',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Start: April',
            description: 'Upon acceptance and completing formalities, begin your research life at LET Lab.',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: 'Lab Visit and Interview',
            period: 'Recommended: December',
            description: 'If applying for October admission, visit LET Lab and consult with faculty around December of the previous year.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application (AO Method)',
            period: 'Application: January (*April for international applicants)',
            description: 'The standard application period is January, but international applicants may have an additional deadline in April.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'AO Entrance Exam (Interview)',
            period: 'Exam: February (*April–May for international applicants)',
            description: 'An interview based on your research plan will be held. International applicants can also select a later schedule.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Start: October',
            description: 'After acceptance and formalities, begin research at LET Lab from October.',
            icon: 'icon-enrollment.svg'
          }
        ]
      },
      phd: {
        april: [
          {
            number: '01',
            title: 'Lab Visit & Interview',
            period: 'Recommended: May–June',
            description: 'Visit LET Lab and meet with faculty members to discuss your research interests and refine your motivation.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application (AO Method)',
            period: 'Application Period: Late June',
            description: 'Prepare the necessary documents and apply during the application window via the AO method.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'AO Entrance Exam (Interview)',
            period: 'Held: Early August',
            description: 'An interview based on your research plan will be conducted (either in-person or online).',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Enrollment: April',
            description: 'Upon acceptance, complete the required procedures to begin your research at LET Lab.',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: 'Lab Visit & Interview',
            period: 'Recommended: December',
            description: 'If you wish to enroll in October, visit LET Lab around December of the previous year and meet with faculty members.',
            icon: 'icon-visit.svg'
          },
          {
            number: '02',
            title: 'Application (AO Method)',
            period: 'Application Period: January (International applicants may also apply in April)',
            description: 'The general application period is January, but international applicants may have an additional deadline in April.',
            icon: 'icon-application.svg'
          },
          {
            number: '03',
            title: 'AO Entrance Exam (Interview)',
            period: 'Held: February (International applicants may also choose April–May)',
            description: 'An interview based on your submitted research plan will be conducted. International applicants may select a later schedule if needed.',
            icon: 'icon-interview.svg'
          },
          {
            number: '04',
            title: 'Enrollment',
            period: 'Enrollment: October',
            description: 'Once accepted and your procedures are complete, you will begin research at LET Lab from October.',
            icon: 'icon-enrollment.svg'
          }
        ]
      },
      
      research: {
        april: [
          {
            number: '01',
            title: 'MEXT Scholarship Interview & Procedures',
            period: 'Held: Late July–Early August',
            description: 'If applying for MEXT (Japanese government scholarship) support, additional interviews and procedures are required.',
            icon: 'icon-interview.svg'
          },
          {
            number: '02',
            title: 'Enrollment',
            period: 'Enrollment: April',
            description: 'Once all procedures are complete, you may begin research activities at LET Lab.',
            icon: 'icon-enrollment.svg'
          }
        ],
        october: [
          {
            number: '01',
            title: 'MEXT Scholarship Interview & Procedures',
            period: 'Held: Late July–Early August',
            description: 'For those seeking MEXT (Japanese government scholarship) support, interviews and necessary procedures are conducted during this period.',
            icon: 'icon-interview.svg'
          },
          {
            number: '02',
            title: 'Enrollment',
            period: 'Enrollment: October',
            description: 'Once all procedures are complete, you will begin research at LET Lab from October.',
            icon: 'icon-enrollment.svg'
          }
        ]
      },
      
    }
  };

  const applicantType = document.getElementById('applicantType');
  const entryTerm = document.getElementById('entryTerm');
  const stepsContainer = document.getElementById('stepsContainer');
  const themeBaseUrl = themeData.baseUrl;

  function renderSteps() {
    const type = applicantType.value;
    const term = entryTerm.value;
    const steps = stepsData[lang][type]?.[term] || [];

    stepsContainer.innerHTML = '';

    const stepColors = ['#B8D9EC', '#A0CFF2', '#7ABDE8', '#4CA3D9', '#368FCF'];

    steps.forEach((step, index) => {
      const isLast = index === steps.length - 1;
      const color = isLast ? '#F49C5B' : stepColors[index] || '#F49C5B';

      const stepEl = document.createElement('div');
      stepEl.className = 'step-box';
      stepEl.style.animationDelay = `${index * 100}ms`;

      stepEl.innerHTML = `
        <div class="step-left" style="--step-color: ${color}">
          <div class="step-label">STEP</div>
          <div class="step-number">${step.number}</div>
          ${!isLast ? '<div class="step-caret"></div>' : ''}
        </div>
        <div class="step-right">
          <div class="step-meta">📌 ${step.period}</div>
          <div class="step-title-icon">
            <div class="step-icon-wrapper">
              <img src="${themeBaseUrl}/images/${step.icon}" alt="" class="step-icon">
            </div>
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

  renderSteps();
});
